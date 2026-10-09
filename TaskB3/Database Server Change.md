# Installation of MariaDB Database Server

It was found that, the MySQL database server could not be managed using the webmin as it was not appearing in the servers list in the webmin panel. 
Thus, the MySQL Database server was uninstalled and all it's packages were purged. Futher, MariaDB database server was installed and configured in the VPS server. 
The following steps were taken with the help of webmin panel. 

**Phase 1: Uninstalling the Manual MySQL Installation**

1. **Navigated to Software Packages:** Logged into the Webmin dashboard and went to **System** > **Software Packages** on the left menu.
2. **Searched for MySQL Server:** Scrolled down to the **Search For Package** section, typed `mysql-server`, and hit **Search**.
3. **Triggered the Core Uninstall:** Clicked on the `mysql-server` package link from the search results and clicked **Uninstall**.
4. **Purged Config Files & Dependencies:** During the uninstallation, checked both the **Purge config files** box (to completely clear out old `my.cnf` path mismatches) and the **Remove unused dependencies** box.
5. **Swept the Remaining Packages:** Clicked **Uninstall**. Because we opted to remove unused dependencies, Webmin's underlying package manager automatically wiped out `mysql-common`, `libmysqlclient`, and related binaries to ensure a perfectly clean environment, while safely leaving the `php-mysql` extensions intact for future website connections.

**Phase 2: Deploying MariaDB via Un-used Modules**

1. **Located the Missing Module:** Refreshed the Webmin dashboard and scrolled down to the **Un-used Modules** dropdown menu on the sidebar.
2. **Accessed the Setup Wizard:** Clicked on the **MariaDB Database Server** option. Webmin accurately detected that the underlying binary software was missing from the server and displayed an automated setup layout.
3. **Executed the Direct Install:** Clicked the green **Install Now** button directly within the module interface. Webmin triggered the backend repository command to download, install, and properly align the fresh MariaDB environment.
4. **Refreshed the Control Panel:** Navigated to **Webmin** > **Webmin Configuration** and clicked **Refresh Modules** to force Webmin to scan the fresh installation, successfully moving the database engine into the permanent **Servers** management tab.
