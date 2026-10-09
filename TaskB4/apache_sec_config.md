# Configuration of Apache Web Server 

The configuration details of the Apache Web Server are stored in the **/etc/apache2/apache2.conf** file. 

1. The **/etc/apache2/apache2.conf** file was accessed with the help of the following command.
```bash
nikhil@vm-583017-ubuntu:~$ sudo nano /etc/apache2/apache2.conf 
```

2. The **timeout** parametere defines the maximum time the server will wait for a network data to travel between iteself and the visitor of the website before closing the connection. This paraemeter is set to 300 seconds by default. It was lowered to 45 seconds. This helps in resource management, avoids overloading the server and helps against DDoS attacks.
```bash
Timeout 45
```

3. The **KeepAlive** parameter was kept on to allow multiple requests per connection. 
```bash
KeepAlive On
```

4. The parameter **MaxKeepAliveRequests** defines maximum number of requests the server can handle in one connection. Once the maximum limit is reached, the server automatically closes the current connection and establishes a new one. This parameter is set to 100 by default. It was kept as it is to be modified after the development of the website.
```bash
MaxKeepAliveRequests 100
```
5. The **KeepAliveTimeout** directive defines how much time the server will wait for the next request from a same client on the same connection. It is set to 5 seconds by default. It was kept as it is. 
```bash
KeepAliveTimeout 5
```
The following documents were referred to for the configuration of apache web server: 
1. [Apache HTTP Server Project](https://httpd.apache.org/docs/2.4/misc/security_tips.html)
2. [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-configure-the-apache-web-server-on-an-ubuntu-or-debian-vps#step-5-enabling-sites-and-modules)
3. [Ubuntu Documentation](https://ubuntu.com/tutorials/install-and-configure-apache)


