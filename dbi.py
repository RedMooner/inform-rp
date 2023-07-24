import mysql.connector

# declare your database variables
DBHOST = 'localhost'
DBNAME = 'rp_db'
DBUSER = 'root'
DBPASS = ''

# establish the connection
connection = mysql.connector.connect(
    host=DBHOST, database=DBNAME, user=DBUSER, passwd=DBPASS)


def select(q):
    with connection.cursor() as cursor:
        cursor.execute(q)
        # connection.commit()
        result = cursor.fetchall()
        for row in result:
            print(row)


def insert(q):
    with connection.cursor() as cursor:
        cursor.execute(q)
        connection.commit()


select('select * from users')

