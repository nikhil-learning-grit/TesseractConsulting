# SSH Key Generation and Hardening

#### Key Generation
A pair of Public and Private SSH keys was generated on the client machine (personal computer) using default settings.
```bash
vboxuser@vm-947201-debian:~$ ssh-keygen -t ed25519
```

 #### Key Deployment
The public key was copied to the `authorized_keys` file on the remote server by executing the following command from the client machine:
```bash
vboxuser@vm-947201-debian:~$ ssh-copy-id -i .ssh/id_rsa.pub nikhil@192.0.2.15
```

 #### SSH Daemon Configuration Changes
 
1. After logging into the server via SSH, several security modifications were applied to the `/etc/ssh/sshd_config` file.
    Disable Password-Based Login
    Password-based login was disabled to protect against brute-force attacks. Because the virtual machine was created via a cloud provider, the cloud initialization drop-in file **/etc/ssh/sshd_config.d/50-cloud-init.conf** was also edited to ensure password authentication was turned off globally.
```bash
nikhil@vm-583017-ubuntu:~$ sudo nano /etc/ssh/sshd_config
```
```text
PasswordAuthentication no
```
2. Public key authentication was explicitly verified and enabled to ensure key-based logins function correctly.
```bash
nikhil@vm-583017-ubuntu:~$ sudo nano /etc/ssh/sshd_config
```
```text
PubkeyAuthentication yes
```
3. Direct root login was disabled. This prevents attackers from gaining immediate, elevated root privileges if the system is targeted.
```bash
nikhil@vm-583017-ubuntu:~$ sudo nano /etc/ssh/sshd_config
```
```text
PermitRootLogin no
```
4. The allowed login window and the maximum number of failed authentication attempts were restricted to mitigate brute-force flooding.
```bash
nikhil@vm-583017-ubuntu:~$ sudo nano /etc/ssh/sshd_config
```
```text
LoginGraceTime 30
MaxAuthTries 3
```
**Note**: Login grace period is set to 30 seconds; maximum authentication attempts are capped at 3.

5. The default root account was found to be unlocked. It was explicitly locked and disabled to further minimize the attack surface.
```bash
nikhil@vm-583017-ubuntu:~$ sudo passwd -l root
```
