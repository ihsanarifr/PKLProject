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
print fahrenheit
