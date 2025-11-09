from config import data_base
import sqlite3

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

cursor.execute("INSERT INTO Parameters (number_of_cls, number_of_stud) VALUES (?, ?)", (0, 0,))
connection.commit()