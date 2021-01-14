import time
import board
import adafruit_dht
import requests
 
# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT22(board.D4)
 
# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.
dhtDevice = adafruit_dht.DHT22(board.D4, use_pulseio=False)
 
while True:
    try:
        # Print the values to the serial port
        temperature_c = dhtDevice.temperature
        temperature_f = temperature_c * (9 / 5) + 32
        humidity = dhtDevice.humidity
        
        print(
            "Humidity: {}% ".format(
                humidity
            )
        )
        payload = {'id': 2, 'waarde': humidity}
        r = requests.post('http://www.student.pxl-ea-ict.be/11902966/taak/request.php', data=payload)
        print(r.text)
        
        
        time.sleep(60.0)
        print(
            "Temp: {:.1f} F / {:.1f} C".format(
                temperature_f, temperature_c
            )
        )
        payload = {'id': 1, 'waarde': temperature_c}
        r = requests.post('http://www.student.pxl-ea-ict.be/11902966/taak/request.php', data=payload)
        print(r.text)
        
        
 
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        time.sleep(4.0)
        continue
    except Exception as error:
        dhtDevice.exit()
        raise error
 
    time.sleep(840.0)
    
    
    
    try:
        
        humidity = dhtDevice.humidity
        
        time.sleep(5.0)
        print(
            "Humidity: {}% ".format(
                humidity
            )
        )
        payload = {'id': 2, 'waarde': humidity}
        r = requests.post('http://www.student.pxl-ea-ict.be/11902966/taak/request.php', data=payload)
        print(r.text)
        
        
 
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        time.sleep(4.0)
        continue
    except Exception as error:
        dhtDevice.exit()
        raise error
 
    time.sleep(900.0)