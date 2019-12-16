CREATE TABLE `user`
( `id` int(11),

  `name` varchar(50),
 `status` varchar(10),
  `login` varchar(50),
 `pass` varchar(40),
  `email` varchar(10)
);
CREATE TABLE `imag`
( `id` int(11),
`name` varchar(50),
 `type` varchar(50),
  `deser` text,
 `data` varchar(40),
 `img_min` longblob,
 `img_max` longblob,
 `id` int(11),
);
CREATE TABLE `comment`
( `id` int(11),
`name1` varchar(50),
`us_login` varchar(50),
`name2` varchar(50),
 `comm` text,
);
CREATE TABLE `pain`
( `id` int(11),
`name1` varchar(50),
`us_login` varchar(50),
`name2` varchar(50),
 `like` int(1)
);
CREATE TABLE `pred`
( `id` int(11),
`id_us` int(11),
 `text1` text,
 `text2` text
);
CREATE TABLE `user_com`
( `id` int(11),
`id_us` int(11),
 `text1` text,
 `love` int(1)
);
