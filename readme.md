# PSStore

Track and notify discount from PS Store

## Installation

1. install dependencies `composer install --no-dev`

2. copy and configure .env `cp .env.example .env`, EX:

   ```ini
   DB_TYPE=sqlite
   DB_NAME=absolute_path_to_database.db

   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USER=my@gmail.com
   MAIL_PASS=MY_PASSWORD
   MAIL_ENCRYPTION=tls
   MAIL_FROM=my@gmail.com
   MAIL_TO=my@gmail.com
   ```

3. migrate tables `./pstore migrate`

4. add conjob

   ```shell
   # Track PS Store discount
   5 4 * * 2 /home/myhome/psstore/psstore track:go
   ```

## Usage

### Add a track

```shell
 ./psstore track:add https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### List tracks

```shell
 ./psstore track
  ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  id   title                    price   old_price   updated_at            created_at            url
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  1                                                 2018-08-26 17:18:43   https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### Track now

```shell
./psstore track:go
./psstore track
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  id   title                    price   old_price   updated_at            created_at            url
 ---- ------------------------ ------- ----------- --------------------- --------------------- ---------------------------------------------------------------------------------------
  1    God of War               1690                2018-08-26 17:24:35   2018-08-26 17:18:43   https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA07413_00-00000000GODOFWAR
```

### Del a track

```shell
./psstore track:del 1
```

### Test email to yourself

```shell
./psstore mail:test
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
