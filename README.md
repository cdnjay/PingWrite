# Ping Write

Ping Write is a simple PHP script I wrote, building upon the [Ping for PHP class](https://github.com/geerlingguy/Ping), that pings a domain name or IP address and writes failures to a daily txt file. How often it runs is determined by the scheduling tool you would use with it, such as cron on Linux/Mac. It checks against a secondary source before writing to file to help ensure the ping failure is likely not due to a local network issue.

I have grander ambitions for this script such as storing failures as structured data (likely XML) to then be parsed and emailed through a seperate script. For now though please enjoy this early release.