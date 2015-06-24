#!/usr/bin/python
import Adafruit_BBIO.ADC as ADC
import time
from time import sleep
import MySQLdb
from datetime import datetime,date,time

#date today
today = datetime.utcnow()
d = today.strftime("%d/%m/%y %I:%M%p")

sensor_pin = 'P9_40'
ADC.setup()

reading = ADC.read(sensor_pin)
millivolts = (reading) * 1800  # 1.8V reference = 1800 mV
temp_c = (millivolts / 10)-1

fahrenheit = (temp_c * 9/5)+32
print temp_c
#print fahrenheit

# Open database connection
db = MySQLdb.connect("localhost","root","root","monitoring_control_suhu" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

# Prepare SQL query to INSERT a record into the database.
sql = "INSERT INTO data_sensor_1(waktu,celcius,fahrenheit)\
	VALUES('%s','%.1f','%.1f')" %\
	(d,temp_c,fahrenheit)	

try:
# Execute the SQL command
	cursor.execute(sql)

# Commit your changes in the database
	db.commit()
except:
# Rollback in case there is any error
	db.rollback()
# disconnect from server
	db.close()
#		time.sleep(3)
