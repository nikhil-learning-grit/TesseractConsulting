#### Objective
To evaluate webmin panel and its suitability for the given remote server. 

#### Hardware requirements: 
CPU: 1 GHz minimum.
RAM: 256 MB minimum.
RAM (Recommended): 512 MB to 1 GB.
Base Overhead: 10–20 MB when idle.
Storage: 100 MB for installation.
Storage (Recommended): 2 GB for logs.
Network: TCP Port 10000 open.
Software: Perl 5.6.0 or higher.

#### Installation: 
1. Webmin was installed by running the automatic webmin-setup-repo.sh script to configure repositories on our system. The following commands were used for this pupose:
```bash
nikhil@vm-583017-ubuntu:~$ curl -o webmin-setup-repo.sh https://raw.githubusercontent.com/webmin/webmin/master/webmin-setup-repo.sh
nikhil@vm-583017-ubuntu:~$ sudo sh webmin-setup-repo.sh
```
These repositories and GPG keys were set up, and the packages were provided by the script. 
The packages were then installed with the help of the following command: 
```bash
nikhil@vm-583017-ubuntu:~$ sudo apt-get install --install-recommends webmin usermin 
```
#### Access: 
As per the official documentation of webmin, its interface can be accessed by entering https://<your-IP-address>:10000 on the browser. (for our system, https://190.0.2.15:10000) 
However, it was found that the web interface could not be accessed. The error message showed as follows: 
`    This site can’t be reached
	190.0.2.15 refused to connect.
	Try:
	Checking the connection
	Checking the proxy and the firewall
	ERR_CONNECTION_REFUSED`
    
The following steps were taken to troubleshoot the problem: 

1. **Verification of Webmin Service Status**
##### Command:
```bash 
nikhil@vm-583017-ubuntu:~$ sudo systemctl status webmin
● webmin.service - Webmin server daemon
     Loaded: loaded (/usr/lib/systemd/system/webmin.service; enabled; preset: enabled)
     Active: active (running) since Fri 2026-10-02 06:02:19 IST; 1 week 0 days ago
 Invocation: f7c97d3b75b94d13b3a7c73b79afdd08
   Main PID: 1523320 (miniserv.pl)
      Tasks: 20 (limit: 8176)
     Memory: 300.3M (peak: 1G)
        CPU: 4h 23min 41.636s
```
##### Observation:
Webmin service was active and running.
No immediate indication of service failure.
##### Conclusion:
The issue was not caused by the Webmin service being stopped.

2. **Verification of Listening Ports**
##### Command:
```bash
nikhil@vm-583017-ubuntu:~$ ss -tulpn | grep 10000
udp   UNCONN 0      0            0.0.0.0:10000      0.0.0.0:*          
tcp   LISTEN 0      4096         0.0.0.0:10000      0.0.0.0:*          
tcp   LISTEN 0      4096            [::]:10000         [::]:*      
```
##### Observation:
Webmin was actively listening on TCP port 10000.
##### Conclusion:
Webmin was successfully bound to the expected network port.

3. **Verification of Local Firewall Rules**
##### Command:
```bash
nikhil@vm-583017-ubuntu:~$ sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     ALLOW       Anywhere                  
80/tcp                     ALLOW       Anywhere                  
443/tcp                    ALLOW       Anywhere                  
OpenSSH                    ALLOW       Anywhere                  
10000/tcp                  ALLOW       Anywhere                  
Apache Full                ALLOW       Anywhere                  
22/tcp (v6)                ALLOW       Anywhere (v6)             
80/tcp (v6)                ALLOW       Anywhere (v6)             
443/tcp (v6)               ALLOW       Anywhere (v6)             
OpenSSH (v6)               ALLOW       Anywhere (v6)             
10000/tcp (v6)             ALLOW       Anywhere (v6)             
Apache Full (v6)           ALLOW       Anywhere (v6)             

```
##### Observation:
TCP port 10000 was allowed through UFW.
##### Conclusion:
Ubuntu firewall rules were not blocking access to Webmin.

4. **Verification of Local Service Accessibility**
##### Command:
```bash
curl -k https://192.0.2.15:10000/
```
##### Observation:
The command returned the Webmin HTML page.
##### Conclusion:
The server was able to reach the Webmin service locally.
Webmin application functionality was confirmed.

5. **Verification of External Network Connectivity**
##### Commands (Powershell): 
```powershell
PS C:\Users\Asus> Test-NetConnection 192.0.2.15 -Port 22

ComputerName     : 192.0.2.15
RemoteAddress    : 192.0.2.15
RemotePort       : 22
InterfaceAlias   : Wi-Fi
SourceAddress    : 10.21.9.50
TcpTestSucceeded : True

PS C:\Users\Asus> Test-NetConnection 192.0.2.15 -Port 10000

ComputerName     : 192.0.2.15
RemoteAddress    : 192.0.2.15
RemotePort       : 10000
InterfaceAlias   : Wi-Fi
SourceAddress    : 10.21.9.50
TcpTestSucceeded : True
```
##### Observation:
Port 22 was reachable.
Port 10000 was reachable.
##### Conclusion:
Basic TCP connectivity existed between the client and server.

6. **Comparative Testing**
A separate installation of Webmin was performed on a personal Ubuntu 24.04 virtual machine.
##### Observation:
Webmin web interface was accessible without issues.
##### Conclusion:
Browser configuration was not the cause.
The Webmin software itself was functioning correctly.
The issue was likely specific to the remote server environment.
##### Hypothesis
Based on the collected evidence, a hypothesis was proposed that traffic to TCP port 10000 might be restricted by infrastructure-level firewall controls before reaching the VPS operating system.

7. **Root Cause Identification**
Mentor feedback confirmed the existence of a Contabo Global Firewall configuration.
##### Observation from Mentor:
Only TCP port 22 had been permitted in the Contabo Global Firewall.
TCP port 10000 was not allowed.
##### Corrective Action:
TCP port 10000 was added to the Global Firewall rules.

#### Final Assessment: 
After resolving the connectivity issue, the webmin panel was found suitable for deployment on the remote server. 




