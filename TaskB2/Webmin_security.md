# Webmin Security 

1. Following the successful deployment and troubleshooting of Webmin, the panel was evaluated for security.
2. It was observed that access to the Webmin administrative interface relied solely on username and password authentication. This represented a single-factor authentication model, where compromise of credentials could potentially lead to unauthorized administrative access.
3. To strengthen access security, Two-Factor Authentication (2FA) was implemented using the Google Authenticator mobile application.
    Following steps were taken to enable the Two-Factor Authentication (2FA).
    a) **Two-Factor Authentication** was enabled in the Webmin Configuration Module. 

    b) The Authentication Provider was selected out of the given options. (TOTP authenticator was selected)

    c) The **Google Authenticator** was installed on the mobile phone. 

    d) For Google Authenticator, we can either enter an existing TOTP secret (such as from a hardware OTP device) or have Webmin generate one. The second option was selected. 

    e) Enroll For Two-Factor Authentication button was clicked, and the QR code given was scanned using Google Authenticator. 

    f) It was ensured that the date and time of the remote server are same as that of the mobile, to avoid problems during authentication.

    g) The authentication was tested and verified by entering the generated token in the validation box. 

Thus, Two-Factor Authentication was successfully implemented on the webmin panel. 




