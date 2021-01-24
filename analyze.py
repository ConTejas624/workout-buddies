import mysql.connector
import datetime

week = datetime.datetime.now()

data = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='workout_buddies_data'
)

mycursor = data.cursor()
mycursor.execute('SELECT * FROM input_data')
results = mycursor.fetchall()

users = {}

for r in results:
    if r[0] in users.keys():
        user = users[r[0]]
        user[2] += 1
        if r[2].strftime('%U') == week.strftime('%U'):
            user[1] += 1
        users[r[0]] = user
    else:
        user = [r[0], 0, 1]
        if r[2].strftime('%U') == week.strftime('%U'):
            user[1] += 1
        users[r[0]] = user

mycursor = data.cursor()
mycursor.execute('DELETE FROM leaderboard')
data.commit()

val = users.values()
sql = 'INSERT INTO leaderboard VALUES (%s, %s, %s)'
mycursor.executemany(sql, val)
data.commit()