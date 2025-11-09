import sqlite3
import students
from config import data_base


def throw_error(error='undefined error'):
    print(f"\033[31m{error}\033[0m")


def del_cls(letter, number, cls_id):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    if cls_id == -1:
        cursor.execute("SELECT id, number FROM Classes WHERE letter = ?", (letter,))
        result = cursor.fetchall()
        if result is None:
            throw_error("wrong class id")
            return
        for cls_id1, number1 in result:
            if number1 == number:
                cls_id = cls_id1
        if cls_id == -1:
            throw_error("no such class")
            return
    cursor.execute("SELECT stud_list FROM Classes WHERE id = ?", (cls_id,))
    result = cursor.fetchall()
    if result is None:
        throw_error("no such class")
        return
    stud_list = students.stud_ids_split(result[0][0])
    for id_stud in stud_list:
        students.del_stud(id_stud=id_stud)
    cursor.execute("DELETE FROM Classes WHERE id = ?", (cls_id,))
    connection.commit()


def init_cls(letter=None, number=None):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    if type(letter) != str:
        throw_error("wrong letter")
        return
    if type(number) != int:
        throw_error("wrong number")
        return

    cursor.execute("SELECT letter FROM Classes WHERE number = ?", (number,))
    result = cursor.fetchall()
    for letter1 in result:
        if letter1 == letter:
            throw_error("this class already exists")
            return

    cursor.execute('SELECT number_of_cls FROM Parameters')
    result = cursor.fetchall()
    cls_id = result[0][0]
    cursor.execute('UPDATE Parameters SET number_of_cls = ? WHERE number_of_cls = ?', (cls_id + 1, cls_id,))
    cursor.execute('INSERT INTO CLasses (id, number, letter, stud_list) VALUES  (?, ?, ?, ?)',
                   (cls_id, number, letter, ""))
    connection.commit()


def show_all_classes():
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM Classes")
    result = cursor.fetchall()
    for stud in result:
        print(stud)
