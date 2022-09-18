#include <WiFi.h>
#include "CO2Sensor.h"
#include <DHT.h>

//sediakan var untuk DHT
#define DHTPIN1 16
#define DHTPIN2 0
#define DHTPIN3 15
#define DHTTYPE DHT22
#define RL 47  //The value of resistor RL is 47K
#define m -0.263 //Enter calculated Slope 
#define b 0.42 //Enter calculated intercept
#define Ro 20 //Enter found Ro value
#define AN_Pot1    34 //Sensor is connected to 34
#define AN_Pot2    33 //Sensor is connected to 33
#define AN_Pot3    25 //Sensor is connected to 25

CO2Sensor co2Sensor(35, 0.99, 100);
CO2Sensor co2Sensor2(32, 0.99, 100);
CO2Sensor co2Sensor3(26, 0.99, 100);
//sediakan sebuah object untuk DHT22
DHT dht1(DHTPIN1, DHTTYPE);
DHT dht2(DHTPIN2, DHTTYPE);
DHT dht3(DHTPIN3, DHTTYPE);
const char* ssid     = "Aay";
const char* password = "hahgimana";
const char* host = "fariots.com";

void setup()
{
  dht1.begin();
  dht2.begin();
  dht3.begin();
  co2Sensor.calibrate();
  co2Sensor2.calibrate();
  co2Sensor3.calibrate();
  Serial.begin(115200);

  // We start by connecting to a WiFi network

//  Serial.println();
//  Serial.println();
//  Serial.print("Connecting to ");
//  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
//    Serial.print(".");
  }

//  Serial.println("");
//  Serial.println("WiFi connected");
//  Serial.println("IP address: ");
//  Serial.println(WiFi.localIP());
}



void loop()
{
//mq1
  float VRL; //Voltage drop across the MQ sensor
  float Rs; //Sensor resistance at gas concentration 
  float ratio; //Define variable for ratio

  VRL = analogRead(AN_Pot1)*(5.0/1023.0); //Measure the voltage drop and convert to 0-5V
  Rs = ((5.0*RL)/VRL)-RL; //Use formula to get Rs value
  ratio = Rs/Ro;  // find ratio Rs/Ro

//mq2
  float VRL2; //Voltage drop across the MQ sensor
  float Rs2; //Sensor resistance at gas concentration 
  float ratio2; //Define variable for ratio

  VRL2 = analogRead(AN_Pot2)*(5.0/1023.0); //Measure the voltage drop and convert to 0-5V
  Rs2 = ((5.0*RL)/VRL2)-RL; //Use formula to get Rs value
  ratio2 = Rs2/Ro;  // find ratio Rs/Ro

  //mq3
  float VRL3; //Voltage drop across the MQ sensor
  float Rs3; //Sensor resistance at gas concentration 
  float ratio3; //Define variable for ratio

  VRL3 = analogRead(AN_Pot3)*(5.0/1023.0); //Measure the voltage drop and convert to 0-5V
  Rs3 = ((5.0*RL)/VRL3)-RL; //Use formula to get Rs value
  ratio3 = Rs3/Ro;  // find ratio Rs/Ro
  
  float temp = dht1.readTemperature();
  float humd = dht1.readHumidity();
  float amonia = pow(10, ((log10(ratio) - b) / m));
  float carbon = co2Sensor.read();
  float temp1 = dht2.readTemperature();
  float humd1 = dht2.readHumidity();
  float amonia1 = pow(10, ((log10(ratio2) - b) / m));
  float carbon1 = co2Sensor2.read();
  float temp2 = dht3.readTemperature();
  float humd2 = dht3.readHumidity();
  float amonia2 = pow(10, ((log10(ratio3) - b) / m));
  float carbon2 = co2Sensor3.read();
  
  Serial.print("Humidity: ");
  Serial.print(humd1);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(temp1);
  Serial.println(" *C");
  Serial.print("Amonia: ");
  Serial.print(amonia);
  Serial.println(" ppm");
  Serial.print("Humidity: ");
  Serial.print(humd1);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(temp1);
  Serial.println(" *C");
  Serial.print("Amonia: ");
  Serial.print(amonia1);
  Serial.println(" ppm");
  Serial.print("Humidity: ");
  Serial.print(humd2);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(temp2);
  Serial.println(" *C");
  Serial.print("Amonia: ");
  Serial.print(amonia2);
  Serial.println(" ppm");
  delay(3000);
  
Serial.println("------------Kirim Data-----------------");
   WiFiClient client;
     const int httpPort =80;
     if (!client.connect(host, httpPort)) {
        Serial.println("Koneksi host gagal");
        return;
     }
   
      String url = "/Fariots/setup.php?temperature=";
      url = url+ temp+"&humidity="+humd+"&amonia="+amonia+"&carbon="+carbon+"&temperature1="+temp1+"&humidity1="+humd1+"&amonia1="+amonia1+"&carbon1="+carbon1+
      "&temperature2="+temp2+"&humidity2="+humd2+"&amonia2="+amonia2+"&carbon2="+carbon2;
      Serial.print("Requesting URL: ");
      Serial.println(url);

      client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                   "Host: " + host + "\r\n" +
                   "Connection: close\r\n\r\n");
      unsigned long timeout = millis();
      while (client.available() == 0) {
        if (millis() - timeout > 1000) {
          Serial.println(" Client Timeout!!!");
          client.stop();
          return;
        }
      }

      while (client.available()) {
        String line = client.readStringUntil('\r');
        Serial.print(line);
      }
    
      Serial.println();
      Serial.println("Menutup koneksi host");
}
