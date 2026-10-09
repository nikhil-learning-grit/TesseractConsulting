#### Objective
Evaluate aaPanel and its suitability for the given remote server

#### Hardware Requirements 
CPU 1 Core, RAM 512 MB, Storage 1 GB 

#### Supported systems:
1. Ubuntu 22 recommended
2. Ubuntu 24
3. Debian 11
4. Debian 12
5. Debian 13
6. CentOS 9 10
7. AlmaLinux 8 9 10
8. Rocky Linux 8 9 10

#### Steps Taken: 
1. The aa panel was installed in the VM by executing the following command in the root mode: 
```bash
nikhil@vm-583017-ubuntu:~$ URL=https://www.aapanel.com/script/install_panel_en.sh && if [ -f /usr/bin/curl ];then curl -ksSO "$URL" ;else wget --no-check-certificate -O install_panel_en.sh "$URL";fi;bash install_panel_en.sh forum 
```
2. The credentials for login were taken with the help of the following command:
	sudo bt 14 
   However, it was found that the login page was not reachable. Therefore, the following steps were taken to troubeshoot the problem: 
3. The version and hardware requirements of the remote server were verified as per those mentioned in the official documentation, with the help of following commands: 
```bash
nikhil@vm-583017-ubuntu:~$ lscpu 
Architecture:                x86_64
  CPU op-mode(s):            32-bit, 64-bit
  Address sizes:             48 bits physical, 48 bits virtual
  Byte Order:                Little Endian
CPU(s):                      4
  On-line CPU(s) list:       0-3
Vendor ID:                   AuthenticAMD
  Model name:                AMD EPYC Processor (with IBPB)
    CPU family:              23
    Model:                   1
    Thread(s) per core:      1
    Core(s) per socket:      4
    Socket(s):               1
    Stepping:                2
    BogoMIPS:                5589.50
nikhil@vm-583017-ubuntu:~$ lsb_release -a 
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 26.04 LTS
Release:        26.04
Codename:       resolute

nikhil@vm-583017-ubuntu:~$ free -h 
               total        used        free      shared  buff/cache   available
Mem:           7.8Gi       927Mi       6.5Gi       7.6Mi       634Mi       6.8Gi
Swap:             0B          0B          0B

nikhil@vm-583017-ubuntu:~$ df -h
Filesystem      Size  Used Avail Use% Mounted on
tmpfs           1.6G 1000K  1.6G   1% /run
/dev/sda1       145G  6.2G  139G   5% /
tmpfs           3.9G   12K  3.9G   1% /dev/shm
tmpfs           3.9G  4.0K  3.9G   1% /tmp
/dev/sda13      989M  150M  772M  17% /boot
/dev/sda15      105M  6.3M   99M   7% /boot/efi
none            1.0M     0  1.0M   0% /run/credentials/getty@tty1.service
none            1.0M     0  1.0M   0% /run/credentials/serial-getty@ttyS0.service
none            1.0M     0  1.0M   0% /run/credentials/systemd-journald.service
none            1.0M     0  1.0M   0% /run/credentials/systemd-resolved.service
none            1.0M     0  1.0M   0% /run/credentials/systemd-networkd.service

``` 
4. The ports displayed during installation were released in the firewall using the following command:
```bash
nikhil@vm-583017-ubuntu:~$ sudo ufw allow 22,80,443,888,3306,8888/tcp
```
5. The ports were tested if listening for connections with the help of the following command: 
```bash
nikhil@vm-583017-ubuntu:~$ ss -npltu | grep -E ':(22|80|443|888|3306|8888)\b'
```
6. The status of aa panel was checked if the aa panel was working by running the following command: 
```bash
nikhil@vm-583017-ubuntu:~$ systemctl status bt 
```
#### Final Assessment:

1. aaPanel was installed on the target VM but the web interface was not reachable. Hardware requirements, firewall rules and port accessibility were verified during troubleshooting and were not identified as the cause of the issue.

2. The VM was running Ubuntu 26.04, which is not listed in aaPanel's supported operating systems. The aaPanel service (bt) was observed to be inactive during troubleshooting.

3. Because the installation was subsequently removed, additional log analysis could not be performed. Therefore, operating system incompatibility is assessed as the most likely cause, but the root cause could not be conclusively confirmed.
