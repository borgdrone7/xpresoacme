set root=D:\xpresoacme\app\
set db=%root%database\dumps\
set mysql=D:\MySQL Server 5.6\MySQL Server 5.6\bin\

"%mysql%mysqldump.exe" -P 33060 --single-transaction --flush-logs -uhomestead -psecret xpresoacme > %db%xpresoacme.sql