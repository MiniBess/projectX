import sqlite3
from config import data_base


def throw_error(error='undefined error'):
    print(f"\033[31m{error}\033[0m")


def new_teach(name=None, surname=None, second_name=None, subject=None):
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    if type(name) != str:
        throw_error("wrong name")
        return
    if type(surname) != str:
        throw_error("wrong surname")
        return
    if type(second_name) != str and second_name is not None:
        throw_error("wrong second_name")
        return
    if type(subject) != str:
        throw_error("wrong subject")
        return
    cursor.execute("SELECT number_of_teach FROM Parameters")
    result = cursor.fetchall()
    id_t = result[0][0]
    cursor.execute("UPDATE Parameters SET number_of_teach = ?", (id_t + 1,))
    cursor.execute("INSERT INTO Teachers (id, name, surname, second_name, subject) VALUES (?, ?, ?, ?, ?)",
                   (id_t, name, surname, second_name, subject,))
    connection.commit()


def del_teach(id_t=None, name=None, surname=None, second_name=None, subject=None):
    if id_t is not None: id_t = int(id_t)
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    result = []
    if id_t is not None:
        cursor.execute("SELECT * FROM Teachers WHERE id = ?", (id_t,))
        result = cursor.fetchall()
    elif surname is not None:
        cursor.execute("SELECT * FROM Teachers WHERE surname = ?", (surname,))
        result = cursor.fetchall()
    elif name is not None:
        cursor.execute("SELECT * FROM Teachers WHERE name = ?", (name,))
        result = cursor.fetchall()
    elif second_name is not None:
        cursor.execute("SELECT * FROM Teachers WHERE second_name = ?", (second_name,))
        result = cursor.fetchall()
    true_id = None
    for id1, name1, surname1, second_name1, subject1 in result:
        if (id_t is None or id1 == id_t) and (name is None or name1 == name) and (
                surname is None or surname1 == surname) and (
                second_name is None or second_name1 == second_name) and (
                subject is None or subject1 == subject):
            if true_id is not None:
                throw_error("not enough information")
                return
            true_id = id1
    if true_id is None:
        throw_error("wrong teacher")
    cursor.execute("DELETE FROM Teachers WHERE id = ?", (true_id,))
    connection.commit()


def show_all_teach():
    connection = sqlite3.connect(data_base)
    cursor = connection.cursor()
    cursor.execute("SELECT * FROM Teachers")
    result = cursor.fetchall()
    for x in result:
        print(x)
