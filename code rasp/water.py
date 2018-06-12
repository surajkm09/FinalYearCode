import RPi.GPIO as GPIO
import time, sys
import urllib2

FLOW_SENSOR = 23

GPIO.setmode(GPIO.BCM)
GPIO.setup(FLOW_SENSOR, GPIO.IN, pull_up_down = GPIO.PUD_UP)
day = 0
month = 0
year = 0

global count
count = 0

def countPulse(channel):
   global count
   count = count+1
def update_useage(useage):
    global  day , month  ,year 
    day+=useage
    month+=useage
    year+=useage
    sday = str(day)
    smonth = str(month)
    syear = str(year)
    #print("http://www.aryansuraj.xyz/test/functions.php?function=updateUseage&userid=suraj&appid=0&dayuseage="+sday+"&monthuseage="+smonth+"&yearuseage="+syear)
    contents = urllib2.urlopen("http://www.aryansuraj.xyz/test/functions.php?function=updateUseage&userid=suraj&appid=0&dayuseage="+sday+"&monthuseage="+smonth+"&yearuseage="+syear)


GPIO.add_event_detect(FLOW_SENSOR, GPIO.FALLING, callback=countPulse)
oldcount=0
newcount=0
diff=0
used=0
total_used=0
while True:
    try:
        oldcount=count
        time.sleep(1)
        newcount=count
        diff=newcount-oldcount
        used = (diff/5.5)/60
        total_used=total_used+used
	#print(total_used)
        update_useage(used)
        
    except KeyboardInterrupt:
        print '\ncaught keyboard interrupt!, bye'
        print(count)
        GPIO.cleanup()
        sys.exit()
