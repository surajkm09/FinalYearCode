import serial
from update import updateStatus
import time 
import RPi.GPIO as io
bport=24
io.setmode(io.BCM)
io.setup(bport,io.OUT) 
ser = serial.Serial('/dev/ttyACM0', 9600)
data=""
phVal=0.00


def block():
	io.output(bport,0)

def unblock():
	io.output(bport,1)

while True:
	data= ser.readline()
	data= data.split(" ")
	if(len(data)>6):
		phVal=data[6]
		print (phVal)
		print ("phVal"+phVal)
		phVal=float(phVal[0:len(phVal)-3])
		print (phVal)
		if(phVal>8.5 or phVal<4.0):
			block()
		else:
			unblock()
		updateStatus(phVal)