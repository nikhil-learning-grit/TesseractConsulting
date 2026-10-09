# Security Audit 

The domain [tesseractconsulting.in](https://tesseractconsulting.in) was scanned using [SSLBoard](https://sslboard.com/) and passed through its TLS audit. The following were its key findings based on which security hardening was performed for the domain. 

1. **Deprecated TLS versions in use** (4 hosts, 16 endpoints): TLS 1.0 and TLS 1.1 are supported on 16 endpoints. These protocols are deprecated and expose you to known vulnerabilities.
2. **DNSSEC is not configured for scoped zones** (2 hosts): 2 hostnames across 1 zone are not protected by DNSSEC.
3. **Security header hardening gaps** (2 hosts, 8 endpoints): 6 findings across 2 hosts include missing or weak CSP, frame protection, nosniff, or cookie security controls.
4. **No CAA policies published**: No CAA policies were found. Publishing CAA records can restrict which certificate authorities may issue for this estate.
5. **HSTS not configured** (2 hosts, 2 endpoints): 2 hosts do not serve HSTS headers.


