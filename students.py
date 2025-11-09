import sqlite3
from config import data_base


def throw_error(error='undefined error'):
    print(f"\033[31m{error}\033[0m")


def init_stud(name=None, surname=None, second_name="", cls=None):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    if type(name) != str:
        throw_error("wrong name")
        return
    if type(surname) != str:
        throw_error("wrong surname")
        return
    if type(second_name) != str:
        throw_error("wrong second_name")
        return
    if type(cls) != int and type(cls) != str:
        throw_error("wrong class")
        return
    cls_id = -1
    if type(cls) == int:
        cls_id = cls
    else:
        letter = cls[-1]
        number = int(cls[:-1])
        cursor.execute("SELECT id, number FROM Classes WHERE letter = ?", letter)
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
    cursor.execute("SELECT number, letter FROM Classes WHERE id = ?", (cls_id,))
    result = cursor.fetchall()
    number, letter = result[0]
    cursor.execute("SELECT number_of_stud FROM Parameters")
    id_stud = cursor.fetchall()[0][0]
    cursor.execute("UPDATE Parameters SET number_of_stud = ?", (id_stud + 1,))

    cursor.execute("INSERT INTO Students (id, name, surname, second_name, cls_id, cls_str) VALUES (?, ?, ?, ?, ?, ?)",
                   (id_stud, name, surname, second_name, cls_id, str(number) + letter))
    cursor.execute("SELECT stud_list FROM Classes WHERE id = ?", (cls_id,))
    result = cursor.fetchall()[0][0]
    result += f"#{str(id_stud)}#"
    cursor.execute("UPDATE Classes SET stud_list = ? WHERE id = ?", (result, cls_id,))
    connection.commit()


def del_from_cls(id_stud, cls_id):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    cursor.execute("SELECT stud_list FROM Classes WHERE id = ?", (cls_id,))
    result = cursor.fetchall()[0][0]
    result = result.replace(f"#{id_stud}#", "")
    cursor.execute("UPDATE Classes SET stud_list = ? WHERE id = ?", (result, cls_id,))
    connection.commit()


def del_stud(cls=None, name=None, surname=None, second_name=None, id_stud=None):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    if id_stud is None:
        if surname is None:
            throw_error("i need surname or id")
            return
        cursor.execute("SELECT id, name, second_name, cls_str, cls_id FROM Students WHERE surname = ?",
                       (surname,))
        result = cursor.fetchall()
        for id, name1, second_name1, cls_str1, cls_id1 in result:
            if (cls is None or (cls == cls_str1 or cls == cls_id1)) and (
                    second_name is None or second_name1 == second_name) and (name1 == name or name is None):
                if id_stud is not None:
                    throw_error("too little information, not one student")
                    return
                id_stud = id
        if id_stud is None:
            throw_error("no student like this")
            return
    cursor.execute("SELECT cls_id FROM Students WHERE id=?", (id_stud,))
    result = cursor.fetchall()
    if result is None:
        throw_error("no id like this")
        return
    if len(result) > 1:
        throw_error("BRO YOU FUCKED UP SOMEWHERE THERES TWO FREACKING STUDENTS WITH THIS ID YOUUU")
        return
    cls_id = result[0][0]
    del_from_cls(id_stud, cls_id)
    cursor.execute("DELETE FROM Students WHERE id=?", (id_stud,))
    connection.commit()


def stud_ids_split(st):
    ans = []
    now = ""
    for i in st:
        if i == "#":
            if len(now) > 0:
                ans.append(int(now))
            now = ""
        else:
            now += i
    return ans


def show_all_stud():
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM Students")
    result = cursor.fetchall()
    for stud in result:
        print(stud)
