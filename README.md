# DESMG

Producted by DESMG.

# WARNING

> **We have squashed everything into the 2.0.0 tag.**
>
> **This is a serious backwards-incompatible change.**

> **We will do more like this,**
>
> **so you must care for updates.**

> **Even if we don't squash tags and commits,**
>
> **we may have backwards-breaking changes in every release,**
>
> **even a minor release.**

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
