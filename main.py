import sqlite3
import students, classes
from config import data_base

connection = sqlite3.connect(data_base)
cursor = connection.cursor()
cursor.execute('''
CREATE TABLE IF NOT EXISTS Classes
(
id INTEGER PRIMARY KEY,
number INTEGER,
letter TEXT,
stud_list TEXT
)
''')

cursor.execute('''
CREATE TABLE IF NOT EXISTS Parameters
(
number_of_cls INTEGER,
number_of_stud INTEGER
)
''')

cursor.execute('''
CREATE TABLE IF NOT EXISTS Students
(
id INTEGER PRIMARY KEY,
name TEXT,
surname TEXT,
second_name NEXT,
cls_id INTEGER,
cls_str TEXT
)
''')


def throw_error(error='undefined error'):
    print()
    print(f"\033[31m{error}\033[0m")


while True:
    command = input()
    if command[-1] == " ":
        command = command[:-1]

    if command == "new stud":
        print("give: {name}, {surname}, {second_name}(or None if has no), {class}(id or number + letter)")
        try:
            name, surname, second_name, cls = input().split()
            if surname == "None":
                surname = ""
            if cls[-1] >= '0' and cls[-1] <= '9':
                cls = int(cls)
            students.init_stud(name, surname, second_name, cls)
        except Exception as e:
            throw_error(str(e))

    elif command == "del stud":
        print(
            "give: {id_stud}(or None) {name}(or None), {surname}(or None), {second_name}(or None), {class}(id or number + letter or None)")
        try:
            id_stud, name, surname, second_name, cls = input().split()
            if id_stud == "None": id_stud = None
            if name == "None": name = None
            if surname == "None": surname = None
            if second_name == "None": second_name = None
            if cls == "None": cls = None
            if id_stud is not None:
                id_stud = int(id_stud)
            students.del_stud(cls, name, surname, second_name, id_stud)
        except Exception as e:
            throw_error(str(e))
    elif command == "new cls":
        print("give {number} {letter}")
        try:
            number, letter = input().split()
            number = int(number)
            classes.init_cls(letter, number)
        except Exception as e:
            throw_error(str(e))
    elif command == "del cls":
        print("give {number} {letter} {id}(or -1)")
        try:
            number, letter, cls_id = input().split()
            number = int(number)
            cls_id = int(cls_id)
            classes.del_cls(letter, number, cls_id)
        except Exception as e:
            throw_error(str(e))

    elif command == "show stud":
        try:
            students.show_all_stud()
        except Exception as e:
            throw_error(str(e))

    elif command == "show cls":
        try:
            classes.show_all_classes()
        except Exception as e:
            throw_error(str(e))

    elif command == "help":
        print("new stud")
        print("del stud")
        print()
        print("new cls")
        print("del cls")
        print()
        print("show stud")
        print("show cls")
        print()
        print("exit")

    elif command == "exit":
        break

connection.close()
