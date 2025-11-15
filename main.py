import sqlite3
import students
import classes
from config import data_base
import teachers

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
number_of_stud INTEGER,
number_of_teach INTEGER
)
''')

cursor.execute('''
CREATE TABLE IF NOT EXISTS Students
(
id INTEGER PRIMARY KEY,
name TEXT,
surname TEXT,
second_name TEXT,
cls_id INTEGER,
cls_str TEXT
)
''')

cursor.execute('''
CREATE TABLE IF NOT EXISTS Teachers
(
id INTEGER PRIMARY KEY,
name TEXT,
surname TEXT,
second_name TEXT,
subject TEXT
)
''')

cursor.execute("SELECT * FROM Parameters")
result = cursor.fetchall()
if len(result) == 0:
    cursor.execute("INSERT INTO Parameters (number_of_cls, number_of_stud, number_of_teach) VALUES (?, ?,?)", (0, 0, 0))
    connection.commit()


def throw_error(error='undefined error'):
    print(f"\033[31m{error}\033[0m")


while True:
    command = input()
    while len(command) >= 1 and command[-1] == " ":
        command = command[:-1]

    try:
        if command == "new stud":
            print("give: {name}, {surname}, {second_name}(or None if has no), {class}(id or number + letter)")
            name, surname, second_name, cls = input().split()
            if surname == "None":
                surname = ""
            if cls[-1] >= '0' and cls[-1] <= '9':
                cls = int(cls)
            students.init_stud(name, surname, second_name, cls)

        elif command == "del stud":
            print(
                "give: {id_stud}(or None) {name}(or None), {surname}(or None), {second_name}(or None), {class}(id or number + letter or None)")
            id_stud, name, surname, second_name, cls = input().split()
            if id_stud == "None": id_stud = None
            if name == "None": name = None
            if surname == "None": surname = None
            if second_name == "None": second_name = None
            if cls == "None": cls = None
            if id_stud is not None:
                id_stud = int(id_stud)
            students.del_stud(cls, name, surname, second_name, id_stud)
        elif command == "show stud":
            students.show_all_stud()
            throw_error(str(e))
            continue
        elif command == "new cls":
            print("give {number} {letter}")
            number, letter = input().split()
            number = int(number)
            classes.init_cls(letter, number)
        elif command == "del cls":
            print("give {number} {letter} {id}(or -1)")
            number, letter, cls_id = input().split()
            number = int(number)
            cls_id = int(cls_id)
            classes.del_cls(letter, number, cls_id)
        elif command == "show cls":
            classes.show_all_classes()

        elif command == "new teach":
            print("give: {name}, {surname}, {second_name}(or None if has no), {subject}(or None if has no)")
            name, surname, second_name, subject = input().split()
            if name == "None": name = None
            if surname == "None": surname = None
            if second_name == "None": second_name = None
            if subject == "None": subject = None
            teachers.new_teach(name, surname, second_name, subject)

        elif command == "del teach":
            print(
                "give: {id}(or None), {name}(or None), {surname}(or None), {second_name}(or None), {subject}(or None)")
            id_t, name, surname, second_name, subject = input().split()
            if id_t == "None": id_t = None
            if name == "None": name = None
            if surname == "None": surname = None
            if second_name == "None": second_name = None
            if subject == "None": subject = None
            teachers.del_teach(id_t, name, surname, second_name, subject)

        elif command == "show teach":
            teachers.show_all_teach()

        elif command == "help":
            print("new stud")
            print("del stud")
            print("show stud")
            print()
            print("new cls")
            print("del cls")
            print("show cls")
            print()
            print("new teach")
            print("del teach")
            print("show teach")
            print()
            print("exit")

        elif command == "exit":
            connection.commit()
            break

        else:
            throw_error("wrong command")
    except Exception as e:
        throw_error(str(e))

connection.close()
