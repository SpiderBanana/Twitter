import machine
import utime
import network
import urequests
import ujson
from machine import Pin, PWM

couleurs = {
    '1': (50000, 0, 0), # '#F44336' Rouge
    '2': (50000, 16383, 16383), # '#E91E63' Rose
    '3': (16383, 0, 50000), # '#9C27B0' Violet clair
    '4': (50000, 0, 50000), # '#673AB7' Magenta
    '5': (16383, 16383, 50000), # '#3F51B5' Bleu clair
    '6': (0, 0, 50000), # '#2196F3' Bleu
    '7': (50000, 50000, 0), # '#03A9F4' Bleu 2
    '8': (50000, 50000, 0), # '#00BCD4' Cyan
    '9': (0, 50000, 0), # '#009688' Vert
    '10': (16383, 50000, 0) # '#4CAF50' Vert clair
}

# Définir les pins pour la LED RVB
led_b = PWM(Pin(0, mode=Pin.OUT))
led_g = PWM(Pin(1, mode=Pin.OUT))
led_r = PWM(Pin(2, mode=Pin.OUT))

# fonction qui définit la couleur en fonction du tag
def set_color(tag):
    if tag in couleurs:
        r, g, b = couleurs[tag]
        led_r.duty_u16(r)
        led_g.duty_u16(g)
        led_b.duty_u16(b)

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'th ccfpd'
password = '123456789'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://192.168.43.218/php-g04/huynh-antoine-g04/json.php"

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

while(True):
    try:
        print("GET")
        r = urequests.get(url) # lance une requete sur l'url
        data = r.json() # traite sa reponse en Json
        tag = data['tag'] # récupère le tag de la réponse
        set_color(tag) # régle la couleur en fonction du tag
        r.close() # ferme la demande
        utime.sleep(1)  
    except Exception as e:
        print(e)


