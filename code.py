#!/usr/bin/env python3
import re
import mariadb
try:
    conn = mariadb.connect(
        user="kali",
        password="kali",
        host="127.0.0.1",
        port=3306,
        database="authentication"

    )
except mariadb.Error as e:
    print("echo Error connecting to MariaDB Platform:")
    sys.exit(1)
cur = conn.cursor()
cur.execute("SELECT data from log")
for data in cur:
    str1 = data[0].split("&")
    str2 = str1[0].split("=")
    if(len(str2) > 1):
        arr = str2[1]
        regex=re.compile(r"(%3C)*(%3E)")
        if(regex.search(arr)):
            print("WARNING")    