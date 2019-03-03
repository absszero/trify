# Trify

Track and notify prices

## Installation

1. install dependencies `composer install --no-dev`

2. copy and configure .env `cp .env.example .env`, EX:

   ```ini
   DB_TYPE=sqlite
   DB_NAME=./database.db

   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USER=my@gmail.com
   MAIL_PASS=MY_PASSWORD
   MAIL_ENCRYPTION=tls
   MAIL_FROM=my@gmail.com
   MAIL_TO=my@gmail.com
   ```

3. migrate tables `./trify migrate`

4. add conjob

   ```shell
   # Track PS Store discount
   5 4 * * 2 /home/myhome/trify/trify track:go
   ```

## Usage

### Supported urls
* store.playstation.com
* api-savecoins.nznweb.com.br

### Add a track

```shell
 ./trify track:add https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### Set target price

```shell
 ./trify track:target 1 5000
```


### List tracked

```shell
 ./trify track
  ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  id   title                    price   old_price   updated_at            created_at            url
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  1                                      2018-08-26 17:18:43   https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### Track now

```shell
./trify track:go
./trify track
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  id   title                    price   old_price   updated_at            created_at            url
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  1    God of War               1690                2018-08-26 17:24:35   2018-08-26 17:18:43   https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### Del a track

```shell
./trify track:del 1
```




## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

TODO: Write history

## Credits

TODO: Write credits

## License

TODO: Write license