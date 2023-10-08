# DESMG

producted by DESMG.

# Composer

```bash
composer require desmg/php-common
```

# DNS Server for RFC792 ICMP

```bash
cp -f ./vendor/desmg/php-common/src/RFC792/resolved.conf /etc/systemd/resolved.conf
systemctl restart systemd-resolved.service
resolvectl status
```
