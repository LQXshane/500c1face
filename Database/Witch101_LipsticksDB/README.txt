Below is a sample manipulation log file that I used to update DB on the EC2 instance.


Last login: Sat Apr 23 16:39:25 on ttys000
-bash: /usr/local/bin/virtualenvwrapper.sh: No such file or directory
29-55-41-155-wireless1x:~ Shane$ cd Desktop/Project\ History/
29-55-41-155-wireless1x:Project History Shane$ chmod 400 500c1face.pem
29-55-41-155-wireless1x:Project History Shane$ ssh -i "witcha500c1.pem" ubuntu@ec2-54-173-250-109.compute-1.amazonaws.com
Welcome to Ubuntu 14.04.4 LTS (GNU/Linux 3.13.0-74-generic x86_64)

 * Documentation:  https://help.ubuntu.com/

  System information as of Sat Apr 23 21:58:08 UTC 2016

  System load:  0.42               Processes:           142
  Usage of /:   34.1% of 29.39GB   Users logged in:     0
  Memory usage: 21%                IP address for eth0: 172.31.7.217
  Swap usage:   0%

  Graph this data and manage this system at:
    https://landscape.canonical.com/

  Get cloud support with Ubuntu Advantage Cloud Guest:
    http://www.ubuntu.com/business/services/cloud

7 packages can be updated.
7 updates are security updates.


Last login: Sat Apr 23 21:58:09 2016 from 29-55-41-155-wireless1x.bu.edu
(cv) ubuntu@ip-172-31-7-217:~$ mysql -u root -p
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 63
Server version: 5.5.49-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2016, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> USE WITCH101;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> ALTER TABLE Lipstick ADD COLUMN PurchaseLink TEXT NULL;
Query OK, 11 rows affected (0.03 sec)
Records: 11  Duplicates: 0  Warnings: 0

mysql> SELECT * FROM Lipstick;
+----+------------+----------+------------------------------------------+--------------+------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------------+
| ID | Color_code | Brand    | Product                                  | Color        | ASIN       | ImgUrl                                                                                                                                                                                        | PurchaseLink |
+----+------------+----------+------------------------------------------+--------------+------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------------+
|  1 | #f9ac9a    | Dior     | DIOR ADDICT LIPSTICK                     | 138          | B015CYRR3G | http://ecx.images-amazon.com/images/I/31K1HvFkDIL._SL160_.jpg                                                                                                                                 | NULL         |
|  2 | #ff826a    | Dior     | DIORIFIC                                 | 014          | B0002DNHR8 | http://ecx.images-amazon.com/images/I/31YJ-gabHfL._SL160_.jpg                                                                                                                                 | NULL         |
|  3 | #cf2474    | YSL      | ROUGE PUR COUTURE KISS & LOVE COLLECTION | 19           | B013U03KWG | http://ecx.images-amazon.com/images/I/41itxhp1DTL.jpg                                                                                                                                         | NULL         |
|  4 | #d58498    | YSL      | BABY DOLL KISS AND BLUSH                 | 09           | B00JXMFFQU | http://ecx.images-amazon.com/images/I/313txcv8xDL._SL160_.jpg                                                                                                                                 | NULL         |
|  5 | #ce4743    | TOM FORD | ULTRA RICH LIP COLOR                     | SOLAR AFFAIR |            | http://images.prod.meredith.com/product/90562b7f1edc88438b9ed6afa97b8343/60b5e0114ff356ddd9265ebb3544b851dabd7315373adc69a16cf12f75ff7c08/l/ultra-rich-lip-color-solar-affair-tom-ford-beauty | NULL         |
|  6 | #c98184    | NARS     | Velvet Matte Lip Pencil                  | Bettina      | B000JLHDBE | http://ecx.images-amazon.com/images/I/31r1YlLMgwL._SL160_.jpg                                                                                                                                 | NULL         |
|  7 | #dc775c    | NARS     | SATIN LIPSTICK                           | Casablanca   | B00FS3Z3YM | http://demandware.edgesuite.net/aaoy_prd/on/demandware.static/-/Sites-itemmaster_NARS/default/dw6ddd016c/hi-res/0607845010043.jpg                                                             | NULL         |
|  8 | #ee3d8a    | Revlon   | Ultra HD Lipstick                        | HD AZALEA    | B00RY9SUAM | http://ecx.images-amazon.com/images/I/4176vKI4tZL._SL160_.jpg                                                                                                                                 | NULL         |
|  9 | #d43f1b    | Revlon   | Super lustrous lipstick                  | Siren        | B0043WAPQA | http://ecx.images-amazon.com/images/I/41PNEt56yoL._SL160_.jpg                                                                                                                                 | NULL         |
| 10 | #ed9982    | NYX      | FULL THROTTLE LIPSTICK                   | Sidekick     |            | https://s-media-cache-ak0.pinimg.com/736x/af/fd/be/affdbe65889e971cc649301e9c9a8ffe.jpg                                                                                                       | NULL         |
| 11 |            |          | NULL                                     | NULL         | NULL       | NULL                                                                                                                                                                                          | NULL         |
+----+------------+----------+------------------------------------------+--------------+------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------------+
11 rows in set (0.00 sec)

mysql> UPDATE Lipstick SET PurchaseLink ='http://www.amazon.com/Christian-Dior-Diorific-Wearing-Lipstick/dp/B0002DNHR8%3FSubscriptionId%3DAKIAIE6IQV4GMYXOKF3A%26tag%3Dlq03-20%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0002DNHR8'  WHERE ID=1;
Query OK, 1 row affected (0.01 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> 
