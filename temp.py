from config import data_base
import sqlite3

connection = sqlite3.connect(data_base)
cursor = connection.cursor()

cursor.execute("INSERT INTO Parameters (number_of_cls, number_of_stud, number_of_teach) VALUES (?, ?,?)", (0, 0, 0))
connection.commit()
