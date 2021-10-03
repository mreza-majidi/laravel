# Running phpcs locally
In order to run phpcs script manually, you should have `docker` installed on your machine, Then, you could run the phpcs script locally using below command:

> Note: We are going to use Docker. As far as Docker restricted Iranian users, please use something like VPN or [Shecan](https://shecan.ir) to proceed the steps.

After installing docker, you should log in to our docker registry.

```
$ docker login registry.dinadev.ir
```

It will prompt you to login, use your gitlab username/password to authenticate.

After log in, use below command to run phpcs:

```
$ docker run --rm --volume $(pwd):/data registry.dinadev.ir/dinaweb/dev/docker-images/phpcs:latest git-phpcs $(git rev-parse --abbrev-ref HEAD)
```

to fix your code with phpcbf, run below command

```
$ docker run --rm --volume $(pwd):/data registry.dinadev.ir/dinaweb/dev/docker-images/phpcs:latest git-phpcbf $(git rev-parse --abbrev-ref HEAD)
```
