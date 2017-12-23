# NyaaChan
![nyaachan](NyaaChan/Favicon.png)

NyaaChan is an imageboard that is currently being developed, it first started as a simple side project, but after asking for peoples opinions on 4chan /g/ it seemed that they had gotten interested in this, so ive decided i would make it open source and release it to the world and have them updated on what ever ive done to it. Ive created a discord group for general talk and other topics but as well for head quarters for the imageboard, If you want to help or just talk with some cool people, Join the Projects Discord Group - [NyaaChan](discord.gg/XX4mdMv)

## Instalation
1. Download NyaaChan Folder
2. Move contents from NyaaChan to `www` "Main Folder OF Hosting Server"
3. Go into your database "mysql" and create a new database and call it what ever you want "utf-8-bin", next press a button that writes import, when there press select file, and find a file called NyaaChan.sql, then just press go
4. Go to `SQL_Connection.php` and modify the four peramiters `$dbHost,$dbUser,$dbPass,$dbName` to your account on the database. and done!

## How to make a board?
Simply go into the database and insert a board name into the boards table. "Note, for a homepage image for the board, put a image file into the thumb folder and name it the board"
