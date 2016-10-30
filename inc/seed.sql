CREATE DATABASE IF NOT EXISTS `3WireWish` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE `3WireWish`;

CREATE TABLE IF NOT EXISTS `WishList` (
    `ID` int(11) unsigned NOT NULL auto_increment,
    `NAME` varchar(255) NOT NULL default '',
    `TYPE` varchar(255) NOT NULL default '',
    `IMAGE` varchar(255) default '',
    `URL` varchar(255) default '',
    `PRICE` decimal(6,2) NOT NULL default '0.00',
    `SOURCE` varchar(255) NOT NULL default '',
    `NOTES` text default '',
    `OBTAINED` boolean NOT NULL default '0',
    PRIMARY KEY  (`ID`)
);

CREATE TABLE IF NOT EXISTS `ADMIN-USER` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `USERNAME` varchar(255) NOT NULL UNIQUE default '',
  `PASSWORD` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
);

INSERT INTO `ADMIN-USER` (`USERNAME`, `PASSWORD`) VALUES ("Admin", "password");

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'The Anarchists Tool Chest',
  'Books',
  'https://c7.staticflickr.com/6/5767/30019977974_dc0ea261da_o.jpg',
  'https://lostartpress.com/collections/books/products/the-anarchists-tool-chest',
  '57.50',
  'Lost Art Press',
  'This book, \"The Anarchist\'s Tool Chest,\" paints a world where woodworking tools are at the center of an ethical life filled with creating furniture that will last for generations. It makes the case that you can build almost anything with a kit of fewer than 50 high-quality tools, and it shows you how to select real working tools, regardless of their vintage or brand name. \"The Anarchist\'s Tool Chest\" will guide you in building a proper chest for your toolkit that follows the ancient rules that have been forgotten or ignored.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'By Hand and Eye',
  'Books',
  'https://c1.staticflickr.com/6/5685/30534462472_0e54422829_o.jpg',
  'https://lostartpress.com/collections/books/products/by-hand-eye-1',
  '33.75',
  'Lost Art Press',
  'The workbook is hand illustrated and hand lettered by Andrea Love. It is a companion to the hardbound book "By Hand & Eye" by Walker and Tolpin. The two books are meant to complement one another. "By Hand & Eye" focuses more on the history behind the geometrical systems and offers projects using the simple ratios explored in the book. The workbook "By Hound & Eye" is concerned mostly with the practical exercises needed to open your inner eye and offers exercises not found in the hardbound book.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Vols. I & II of The Woodworker: The Charles H. Hayward Years: Tools & Techniques',
  'Books',
  'https://c5.staticflickr.com/6/5667/30534462732_23c2aa6d0b_o.jpg',
  'https://lostartpress.com/collections/books/products/the-woodworker-the-charles-hayward-years',
  '80.00',
  'Lost Art Press',
  'The first volume is on tools and the second is on techniques. There is little doubt that Charles H. Hayward (1898-1998) was the most important workshop writer and editor of the 20th century. Unlike any person before (and perhaps after) him, Hayward was a trained cabinetmaker and extraordinary illustrator, not to mention an excellent designer, writer, editor and photographer.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'The Unplugged Woodshop: Hand-Crafted Projects for the Home & Shop',
  'Books',
  'https://c1.staticflickr.com/6/5502/30534462512_32b017159f_o.jpg',
  'https://theunpluggedwoodshop.myshopify.com/collections/books/products/the-unplugged-woodshop-book',
  '30.00',
  'The Unplugged Woodshop',
  'Unplugged \- no power tools needed! For the growing number of woodworkers who are opting out of power tools and returning to hand tools, The Unplugged Woodshop is a refreshing concept and a welcome change. Written by custom furniture maker and hand tool expert Tom Fidgen, this new book promises to be as successful as his first book, Made by Hand.',
  '0'
);


INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Router Plane Model 2500',
  'Tool',
  'https://c6.staticflickr.com/6/5342/30651377365_13266a4d55_o.jpg',
  'http://www.walkemooretools.com/shop/router-plane-model-2500/',
  '290.00',
  'Walke | Moore Tools',
  'This has easily been our most anticipated tool to date and it\'s a monster.  Based on the Preston 2500P, it is the largest, heaviest, and most versatile router plane ever produced.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Winding Sticks',
  'Tool',
  'https://c7.staticflickr.com/6/5557/30019977814_217c72a994_c.jpg',
  'http://www.leevalley.com/US/wood/page.aspx?p=53276&cat=1,230,41182',
  '29.50',
  'Lee Valley Tools',
  'Winding sticks are not new; woodworkers have been making them for years from scrap wood and using them to check the flatness of material. Placed at opposite ends of a board, they accentuate any twist (wind), making it easier to identify and correct. With the sticks in place, sight across their top edges. If the edges are parallel, the board is not twisted. Reposition and repeat to check the entire board. Unlike their wooden cousins, our extruded aluminum sticks will remain dimensionally stable and straight. The satin black anodized finish on one side reduces glare, and the machined section on the other side provides contrast when sighting. The machined grooves are spaced 1/8" apart to help estimate the amount of twist and how much stock to remove. The two 18" long sticks nest together and have hanging holes for easy storage.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Holdfasts by Gramercy Tools - Set',
  'Tool',
  'https://c5.staticflickr.com/6/5787/30019977884_5893baf232.jpg',
  'https://www.toolsforworkingwood.com/store/item/MS-HOLDFAST.XX/Holdfasts_by_Gramercy_Tools',
  '34.95',
  'Tools for Working Wood -- Gramercy Tools',
  'The best part of holdfasts is how fast they work. You hit them on the top of the arm to lock them and on the side of the stem to loosen. In general they are used (and work even better) in pairs. The holdfast is designed for 3/4" hole in a workbench top of a 1 3/4" thick or thicker. 6 1/2" reach. Maximum clamping 7 1/4" in a 2" thick benchtop. Patented. Made in USA.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Narex Mortise Chisel Set',
  'Tool',
  'https://c2.staticflickr.com/6/5573/30651377225_9da657536e_o.jpg',
  'http://www.leevalley.com/US/Wood/page.aspx?p=66737&cat=1,41504',
  '85.00',
  'Narex',
  'Well made by a small Czech firm, these chisels are available individually or as a set of six. About 5-3/4" from tip to bolster, the accurately ground chrome-manganese steel blades (hardened to Rc59) have relieved edges and taper from tip to shoulder taper for sidewall clearance. The stained-beech handles are oval shaped both for good grip and to resist rolling on a work surface, and have steel hoops and ferrules. 11-1/2" long overall. Tip guard included. Excellent value, these chisels are made to our specifications in Imperial sizes.',
  '0'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Veritas Bench Plane Kit',
  'Tool',
  'https://c1.staticflickr.com/6/5636/30615359776_f4be03b920_o.jpg',
  'http://www.leevalley.com/US/wood/Page.aspx?p=71379&cat=1,230',
  '44.50',
  'Veritas',
  'With this kit (and basic woodworking skills) you can build a bevel-down wood-bodied smooth plane with a Norris-style mechanism for easy depth and lateral adjustment. The kit includes a blade, a Norris-style adjuster with a steel cup to seat it in, plus a knob, tapped insert and cross pin for the lever cap, all made of brass. The lapped blade (available in A2, O1 or PM-V11 steel) is 1/8in thick and 1-5/8in wide with a 25deg bevel.',
  '1'
);

INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Mortise and Tenon Magazine -- Issue Two',
  'Books',
  'https://c6.staticflickr.com/6/5687/30651377285_26b9248146_o.jpg',
  'http://mortise-tenon-magazine.myshopify.com/collections/magazine/products/issue-two',
  '24.00',
  'Mortise and Tenon -- Joshua A. Klein',
  'At 144 pages of ad-free body copy, it\'s more like a book than a typical magazine. The cover is thick and rigid and the pages consist of perfect bound thick (70#) uncoated paper. The uncoated paper gives a vintage look and tactile quality that conventional coated paper just cannot achieve. This massive volume weighs in at 1 lb.',
  '0'
);


INSERT INTO `wishlist` (`ID`, `NAME`, `TYPE`, `IMAGE`, `URL`, `PRICE`, `SOURCE`, `NOTES`, `OBTAINED`)
VALUES (
  NULL,
  'Chisel/Carving Tool Roll -- 18 Slot -- Navy',
  'Other',
  'https://c6.staticflickr.com/6/5556/30565000181_48d8f44f1b_o.jpg',
  'http://www.txheritage.net/chisel-rolls',
  '90.00',
  'Texas Heritage Woosworks',
  'Your tools are an investment, and should be treated accordingly. Proper protection from the outside world is essential in order to keep your tools in proper working order. Our waxed canvas tool rolls are designed to accommodate a wide variety of tools across a wide range of trades and disciplines.The rolls are constructed of 14.7 oz. waxed cotton canvas. The waxed canvas is ideal for several reasons. When the wax is applied to the cotton, the fibers swell, creating a stronger material that is less susceptible to normal wear and tear. The waxed canvas creates a powerful moisture barrier, protecting your tools from accidental spills or water ingress. This wax treatment is renewable, allowing you to maintain a high level of protection for the life of the roll. The wax refinishing compound is available in our General Store. A unique quality of the waxed fabric is that it has a "memory". Once it has been initially rolled up, the canvas takes the shapes of the tools it protects. The canvas will now work with ease, falling back into place as it rolls up. The more this material is used, the better it feels and performs.',
  '0'
);
