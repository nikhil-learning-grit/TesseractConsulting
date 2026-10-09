# USERS

Different users need to be created for managing different aspects of a website. For the website that will be running on the current server, the users and groups were divided as follows. 
```mermaid
graph LR
    System[System Roles] --> Developers[developers]
    System --> DBAdmins[dbadmins]
    System --> SysAdmins[sysadmins]
    System --> Security[securityadmins]

    Developers --> FE[frontend-dev]
    Developers --> BE[backend-dev]

    DBAdmins --> DBA[dbadmin]

    SysAdmins --> SA[sysadmin]

    Security --> SEC[securityadmin]

    FE --> FE_Desc[Builds and maintains UI]
    BE --> BE_Desc[Develops server-side logic]
    DBA --> DBA_Desc[Manages MariaDB]
    SA --> SA_Desc[Manages Ubuntu/Apache/PHP]
    SEC --> SEC_Desc[Manages firewall/auditing]


```

The following commands were used to create these groups and users, 
1. Adding all the required users:
```bash
nikhil@vm-583017-ubuntu:~$ for user in {frontend-dev,backend-dev,dbadmin,sysadmin,securityadmin}; do 
sudo useradd $user 
done 
```
2. Adding all the required groups:
```bash
nikhil@vm-583017-ubuntu:~$ for group in {developers,dbadmins,sysadmins,securityadmins}; do 
sudo groupadd $group 
done 
```
3. Adding users to their respective groups
```bash
nikhil@vm-583017-ubuntu:~$ sudo usermod -aG developers frontend-dev 
nikhil@vm-583017-ubuntu:~$ sudo usermod -aG developers backend-dev 
nikhil@vm-583017-ubuntu:~$ sudo usermod -aG dbadmins dbadmin 
nikhil@vm-583017-ubuntu:~$ sudo usermod -aG sysadmins sysadmin 
nikhil@vm-583017-ubuntu:~$ sudo usermod -aG secuirtyadmins securityadmin 
```
