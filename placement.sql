-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 11:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cont` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(256) NOT NULL,
  `c_cont` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `cont`, `email`, `addr`, `c_cont`) VALUES
(1, 'Aparna Bhonde', '7894561230', 'bhonde.aparna@gmail.com', 'Airoli', '32165498700');

-- --------------------------------------------------------

--
-- Table structure for table `datapoints`
--

CREATE TABLE `datapoints` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `offers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapoints`
--

INSERT INTO `datapoints` (`id`, `year`, `offers`) VALUES
(1, 2018, 20),
(2, 2019, 30),
(3, 2020, 35);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `oid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `package` float NOT NULL,
  `bond` float NOT NULL,
  `offer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`oid`, `pid`, `comp`, `package`, `bond`, `offer_date`) VALUES
(629, 10, 'ugam Enterprises', 3, 3, '2020-04-22'),
(630, 10, 'TCS', 3.4, 2, '2020-05-19'),
(635, 11, 'IND', 4, 1, '2018-04-09'),
(636, 11, 'FNC', 2, 2, '2019-10-09'),
(637, 12, 'TCS', 3.5, 2, '2020-05-01'),
(638, 12, 'LTI', 3.7, 2, '2020-06-02'),
(656, 19, 'aws', 3, 2, '2020-07-08'),
(657, 19, 'TCS', 2, 2, '2020-07-08'),
(659, 22, 'TCS', 2.5, 2, '2020-07-15'),
(660, 23, 'TCS', 2.1, 2, '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_path` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_path`) VALUES
(1, 'images/MV1.JPG'),
(2, 'images/MV2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `pid` int(255) NOT NULL,
  `name` varchar(28) NOT NULL,
  `cls` varchar(28) NOT NULL,
  `division` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`pid`, `name`, `cls`, `division`) VALUES
(10, 'prasad deshmukh', 'BE', 'B'),
(11, 'scout', 'BE', 'A'),
(12, 'Prasad', 'BE', 'A'),
(14, 'Deshmukh', 'BE', 'B'),
(18, 'Alia Bhatt', 'BE', 'B'),
(19, 'Prasad', 'BE', 'B'),
(21, 'John', 'TE', 'A'),
(22, 'Prasad', '2021', 'A'),
(23, 'Prasad', '2021', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`) VALUES
(7, 0x89504e470d0a1a0a0000000d49484452000000e6000000db08030000004e501dfa0000006f504c5445f7f7f71ba2e6009de5fffbf8009ee5fbf9f7fefaf8009be5f9f9f7f5f7f700a0e6eff4f6fffdf8e8f1f6e4eff5ecf3f66cbbebd7e9f4d0e6f35eb6ea2ba7e7b0d7f07bc1ec3face894cbeedeecf5bfdef2b7daf1c6e1f24fb1e944aee888c6eda1d1efa7d3ef74beeb8fc8ed66b8ea523e74c20000148849444154789ced5d6b9ba23c0f961ea0d6ea08e20951f1f0ff7fe3362d28424b3b88b3e35cde1fdee77a77761942d3244deea4a3d1071f7cf0c1071f7cf0c1ff0663ec7fbfc28b41434cc75fd3c958fef7cfca4a45bc59a4244288afcfcb2ff12705a5ec944684071a9c448be4ef09ca7096a2e0011c2d66e1ff7eaf614147f386907a4997e27fbfd990609335694b29111df1ff7eb7e140bf526e943208d0eacfac271baf6d524a392f7f454e31376b6ca9b719fddf2f3808c25dd421a53444933fe157c69d424a31577fc10c854597ca02c8ec0f2c274d1d520664f3fe51024d0c714103e9fb6b6db8b13b930a68fbf65a2bf66e31c9f2ed7d0a730a296dedf1dd37279bba1733e0d777df9c6cebb64041b07ff780cf4fccc3db8b397305070a5f6f6e6ad9d8636f063c9dbcb5ada522f159ccb79693856c77f0d99a010ff87afc9e7a4bf174132010c18d0205643d7a4339a5b69e0981f4dddcbd960b21e5e4fb77cbc6b390ee0e915c46c42f53b170ad27caa896f3ad32f15494da8a0e4bb93d99f388924aeb2336526f17ef2327c55a5b09992718ac27fb72ac2652c920719172be49d0a76d2b686bb09995a503ec38a29085964d1ca59cf33790938aafbab6ea3fc460453b05ad325e62850274feed619fd4d639026d45f344dc7c3d8da594c7c2be3d497cfbbbe28c7e797abaaead535c33242c0513232eb61c264f6a474d3c97721e7fad9cb74800adefdaaa2056244072bd4461949307f1c3811a5fc9af4dc3432480742450d35685308b02548059c149b3ee27115dc78d48365c483937bf4f4eabb6aa1f4a5fc24b434a59c151dd14494395b7eab88cfe4639efda7a6868ab02960110bf1d25c3f172cf11e1008282b376ab0d3026fd0f2a7e4c4ec628750499525be7a4b4ada657065f1265f7cdc7a898e4c56a7e3d1f4ff1a8b9f4d55f1a1d78109d7ec27fd250b06d9265c99689f61a95af03da1a95da6a2411d06d1490867f60340c31c621b59f2ed9782df5f6f5656c8ae3cd812005b2df6c8dbad5adadfaef802fe911a4d2c95aeaedeeb5eb4971beaf990ab98b164953bf201278885b4da87c498f5798a452ceec957286b33d6a84661c5da735eff6605bed94973097ae7ed3ef551914f151feba1cb5d83585540119bf7d5a56c5add17a67d356f5f726d2c8eefb2e089d06af94536c2c4159a44dbc396e353e49fa3fde3f2d4967f297a2e43572c2d9d60219cbb070648f041ac027a9b2bb27de926e3984f5af90132f3bcef9289bdc6cebd821e4886d49409e3b532939f976f8b4268bbbb319dc1cb71adf51ba84f4c98c64189397c819ae3ba50c94b67eb91612208e7d7dc9c3fb245097980d2c677872a5a6ba6deb1df4095ff2f0462a59361d564ee6a442ecfd88a16c123ce14beac0f27bf174d03212cd9c650094787d5871952e733ac8bbe10c0d5c5ec1736715c0af76feb42f7978d80ee46c1ebe9f800f47c087d842a52fe1565f224f77f28c42fdd3ce78170d5946f2aa2a130f550cedbe84857892ec8aa2d82513ec65cc2484540e72184a4e8fade9b539c19744c6bf46c56c7380b39d044287cdd6c3ffaa2716d17065247af2289ea39debcd681e595239783b8feabf82478bd82f4cd2720e535ef1216305c495bb50bee460f816941e5b471f8e567eb64597917cb5bc135e62f2f396756e2a21cd3537c42d746ae4ba9374eb659175196908e3eda683ea05e08b22198bd0ac42a18cfda365fb75e8d656b3267e672d2823a121ca4874e74312e02a6b820e976c8adbed4f74269ddcbcbde1d461c302cfd077a83212751c4f34160152d52d8ec87ab59b51fc90a10b0ff2676dd30f1bb6e3cbf9c54b4395917cf83ba960f1e99c22654de4aaa6f3537cdfac585a0a93cbc19d55797ef0d3453c27439491dc14017950c6d264623cdbadd611e25a83f96293abcd0afc605399c7b51dd0c9cfb60c5346a25da983f28572bd548c6231c92f7ba234b8daace354ae8ce98d5d8fe57e210ec38394575c0d068fb96546433c4e8ada6685ff9d89563addfdf948e1b79c8c0e515e09370e97d2d62e29ea687bdbacf0211e36ab023e383fdfdaf300a2ca48d1e949395dcbb9363e5f6fd6232458ee9b7574f3ac6ce6b6e0def914363e3c5f5e8178b40bdcaa2f8c82014b175c6f568ea2c3319b0af0ac74e90e3b7cb5b6ec368b9e9413620dbb90f2ab9f99e5b32b5f920bb959aff7cd9aae965b06951417b87f7ca3ca2bd19365246cef594367a92fe4f06594137c09814e4cb959d97679f3ac04a56767ba30b06d07bb9ccf9691a8a967564b8999fc190f12d32f60d297dcec48b55991f6ac1e5206c1370e1f839491c4d1b83f237057401f94e6b6fde5c559fee287bcb17437d2b36ec0b3fa48c9fd12a31a741a3c5f5ec179da7eb3b55e439ccbf541e766c81eca3007b54fa2e0595952782de7bad87a674d862923d17111d44fc052b25b062b9c4985696e50e834a97877eda70967f65781a0f5464aeae7587479e5d9325238cae6bccad9f03318d1ea0c4947d7d60655d4436ba7a98b98a83f25186725a9f092940e535e9146649b9d369b53b6c5183202a8ca08305501ad6f50f025516efd8de1d12d269fef16dae346e926f659d3c1ca48ec964f65e3ba1d2d37e8aadaa0348ea42fb13b049fe33a3909fcb55c10d82b1ca597983a25d5e59541cb48fa8475d353bd41f7d506957b6fdd613cd8d46d6ba1af5106525252ee2d29501bf8b065241de3dc9ec8c60bf8153108aee8229ddd971e8d8de5c11ad851bb2b2a253d26ddb6b7514652daf79d74bee9918f56a6dca032b40c3354520fad70e7b9d1bd7b534a3adecdf94d52da514dc559549591280ea52db91ca53199f99a6b03c067f0456d038a8cc006c55fe04bba2335da990902342852148fb34ad2e09830aba4aabc22e5a4385f054891012171738cad5425175a1140b8850dba00ea61f7d4021cbb1ca721954ff1e42ee92a6796f7164be8d219e7eb87588ba345dc37e415e7c61ea46a834214dde9a5e14d824e23c4af266d60b0a667ae69ba52526a94549c22e00fb51e8956bd4b2ee055eaff566e50627bc90a94ae6013ef0e762bc4ed4c0cb931732da97435e6351527f39349dad3d7686a7e5d2686411de5f9cbce679bcac31b4f63611f30c383ced10e20e94ac59e52d273366e4a8a33cb8379df5810c8b1a81eed802f01addddb6ae63a9058c81fb3a965c48cc757a778544a2ab5b72169d861c5fbc648e0006bf62654253eb94149ba359e41d5b94d9ee0e05fa89ddc86fd13352465f9b19494cfb351252914c63bd06fa28b26ae576aaba98742755ea09d21093d86209fe7a212fac49befc449e14332d2ff1ee3e4986a49c97c3756059c6eee0b77783a1b1e62818ac62e20668d5a1b543b9c758da01a4e2e41cdf0cb75394ebeb57d180e6f92ca607f22a030de0577d1d98c1a1158ed54e54ba44044efc0fadfdc9156868c818b4835eb9aa4e79d93f8d786742bf1a592f4eacc19f6a166ab37ad68dd8a7a58d6a7e8640fd165ad20cbf0d19c4e9107bc699265593235fb410fc8c835de68499d6782becbc92a923eadd3d8a554b041b34a2a253709cca10830669e0bb0a1e1404a1a799c63fb4e8d006a5394854deaa1d2d1e8a2b5102741979b190434c4db95c7e49abef39614e9799237cf253272850d0a8c099dffeb081a0602f619d0d3536b35556491b6a887d50655d9dc8064cf97955df019d0d37f724d59686995d2b5d9e1cb3584773f31da32740a19dcfad37a40400ecb742e1160e0c18fcc7fa4b17fe29300fe46d5a201aac87d264970ac4ab9c58f8c63f5c93149f4175355320ddc153ad1ec85f58f4c63f51ab714a47dc5045f020992166116c7d28f10a84cf01f30407ecc97de7388148dbd3803fdf9d156ab344174d4ffd9bcdc9dc85fe851b5f846e1f401258d7dd2a4f350b6023f224f2a3a38b8be7e5c0cbe7a38949e730a81c64ea68c26d1436b42992650e74efa75f8119fe2433244f6a247e7a397258d1d28917772b0506982aa1d9c41028893fcc51b34f4a073f3719f27d3d98dc64e0f37aa37c32a39bdb9fb11e06d5b37a88add9ff5ac32a68d2f6e29cfbdb6664d363ae325d9b2cc64e60f21aedaa0f35153655888c7db7cb79327315beed503ec761673e96cd2e76b3e68aad2df6568481300ca0dfaf8a714cf8a3d8743350256e38ef5d9bef24b6d37ebf264ed58cc5ea19e2a8cdded8e2e7baa1c093ab7ea162c3ca3c606154076af753323be197f5350160a296354668432074d2eea93db6363f022a2f6ffe19ca2d204463a92daa0e816f9d1f1aa751026dc902beb90516ac35ae7e1f915b25ea2d3a7f4eb5283d523f5acaa1a3c0b818fa562516e509d0f521923c3ab9c3d8d9192f150cab8d84df4c0a5b135cddd5765abbd58171c326b7c614d13281ebfdeb6ba47d100af461a46f1f4b4573212b4587e895ba97c6ae51df15e1d3a74ca1b34762614178677f458507ad6b9dad03ece8bbbe6ce41191b64e4701bc5be26a37e2d0b890ced7bc561b8496367ea1205e248faeacc7bd13507b3b3055295ea958c0141fbd3a38c23453d353e345af58aaa155da44e63d77ee47032129feaff30910192236b6c33155257817851c9386db74ab0d11e9ede7c3e4af37e7141d22887e96af59941d99374daedd0dc68f3f056c607503cd95db92e861d8a998988a0a7d16cc69b3a5f8ba3f464238a76a3419991db122a27d1493a8bc64f4cafcbcedf77e3148f775745a021d1bad89ae7bf30bc57e47716d21c98900afb8b7d7c8803403dacf9129dc5d354af76d9b3057c714e4d7c64472bf241491252c42fcb6417354149ff6e45704d926446fb332c14f1e0ee4ba43f24f77473abecd982bb55a07e1b41598caf64ec20cdd0eb63630aa3ecdbd97c4db351637d20b954abbdebe3c7f1f6c446d9b3fd363e8da1951f84327c59c84c3771d8450c52ed374fddd6404331cb8acbf1582c638a55deb7f225ca153e1434998334e343da53bd48f2cc92afee342f87f6099855f78c9454c4c7b4a4d9c81d32876a5fa595ca6ef2c7764407054a78b0c0c9096396ac4ae28822783976183e3fd91a87e3c5e300352957d5caa3d904f346e0d331ff48ea857b6b4a3157f12ad0941145ed725a11bc7a6e5ea6a96b3608f66af91804090f698212c6695665dbd1d58f36acfd63b0ea2075d5a0a6825efb97dc2c5db31c3663952630f5673666934113d9575635917941517fba287a4d299f98656bef9a8d0ab13510c04bd427cdc1357edbe52a45554ba08f903c385b885c2629a10579d13f15ac7a022c40d03673670b37e584b2e794967a2ab799aaa6a806cfdca3d6c1f7df28d24343f953030258c72955751559bb9674d97322f5f4d63f45d64768d70d7d8a00e41b9ee16929210eef822d4d00477b7122b07aa59e92c5269f94dd705e0ec5bb494c0f41383c311bddd90967ea6c567d35524f4b5a87d6d31822cbea45b04793987fa611389764fd4c9a97ba3e7bd4f08dd29e86d39a9ec29768b595fb057bbed9719836f6dc2016a87575a35e5f62da9eaed541a2ecdae4e0550c7df25e3ddbfe523e373ea83b1ba8e554047ad05306f6342aed6914400fae10963941d8c96cf1d5d98af5fd84941e1f1d4e63d2ef839ea2ca9ea283b4a742eba965ea139b3ad4c437d558e3f0f7865b67a1f432937effa6a701d8d3da300bdb0c2feca210faf51ceb81574f769ef8cd24a9fbfd788c1ba3496c13d9ba09a1b54e9e4e29f321c6b46157c6a65c50b915c1ef636c1aa40bc1a6612612ed2a4512bf29162ad56b1a5ef34d31dd432c00d5c80adbcb1c8c13ae42fb8e909bcdc7fe0c24e548b8c71340aad1d178a80abd861933d8e63cf9dadcaddd40980c3410d3534cd79737945af49fc7c6b38f66333a11c6fce1d682fef02166f84c666b15ce4ad0c9b955f8e3e4e4c50853ddb7689021ae3e99299f8e7636b24c60612259d46796f993ddf5a8da6146f27a4d66f3611b37ba3d6b6078a6268cab66e6e0ea9e725b3e701b0c26a5d7f4277ef11a0eb9b126a8619e609c9d4ecb7c3bf23d47ebbef8c1c648bbef76f56513855d3de59aebee9fc75195daa85f85cbf872ce52876fc343abdbf309a8fbcb871cf1ee9e78e37dc6b7cc7be881c1a5f408f748d659d4a8c15df6f4839eb332ecb504eccb596f4d8b8997756c1644fbbe113045a2e5c0971284cbce64904e8ccf1d0dec1a1e654f3706998164008c26b42285528eaa3a9e261e450e67d9d3093696e700d3409ba7115eed2789adf479274596237ce56e46c78eb2a7138c1d5e76cd4d68198bc4033028acba7c894487a58342e92a7bbaa0a6cd45afbab4486c4c2d66f78e2f862785e278ca88b47b5cb0c7e4870ee8997aafbb9a09c7adfb4f093fd5ec2b0bc37cae6fd6dc778eb3ef7fed4b459f78e585622ccc0eb57a9d343b9be64102ee9b8225859fcdecbacb1c53593a80af83ccf5ec04c5db62c135cd667dcc4d2bc6429a2d344d6091db3c8ce94a263f08459f7879370bd47ea67112cf983d2942c5ec12a8254d8b2ff32e6d5eb0a59fed8edcd5557f3f74a52173be0d5c5ab4af8206631cd8bce2467e3e368df33c998ead177795f4895f757123c57157d0c0beea3975e0ba2f02dd431eec0be3c55da36a7ef22fbb6e94e2f15231b30959c52ddd553320b4576122bed64d1b5cdc65ca0469fac42f937254060dea56b168bd6c4e0db97561d3c9bce99179b498b68e76bf554a00b5070dea0a06c614a3a81d5c91e6214bd3277ea233b2171e83865a3441f5e54cb65e8ae8314e7a836b9df575d52a68b8ccee4b0a330488fde8f310d00d79bbc2eb500f1ab25bd0a0ca9e362983fab159d327dee1ca75e934aaa06133d54bca26dd39c31b071ccadd4f91447e120c8fcaa08194418363623c5f6b8ba3ee7719ee1e9bd703a8aa65d0504c7047d5af5c4e555ac2cba86bb0d7afc43d6840abd8dc2a52434a07a14ffc17401ca82fce75490949237dc3d4fb4939d241c3daa39b143a7cb3c1ef45fb41c813493e778b19a4c38f27fd61d0b1d7ad396f2ea5eef2f4c1d03733fe2cfc2e077ac97da23f09af2a7810bcb9947e62f2012eebfcbff0b941e33bece85f0a1fca63ffd162bf06acabe1f826e610cca6ff0b0fea46cf1129bf0ad8d10f11f49f3dfa9be073e7eef2ed75d6451a56abf94cb9f7b7c0791f36f1a347ff76388dd07ba50c6c80c95f1d68d5ccde15aabdd5aab2bfaaf6f514e0f24c9b94fb3f60652b609b9c68f10ed9676f58f416ad06b9bff8f740e4694b50127c67c8d57b80b2e261965a9f91656f8190ede6fa7a16b8b86bb11cff3185bd81e251bc2b2e976217b72ec3f85bb88f74f9e0830f3ef8e0830f3ef8e0830f3e68e21f1d512d25cb6b83f90000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `tpo_connect`
--

CREATE TABLE `tpo_connect` (
  `name` varchar(220) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(220) NOT NULL,
  `addr` varchar(220) NOT NULL,
  `office_no` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpo_connect`
--

INSERT INTO `tpo_connect` (`name`, `phone`, `email`, `addr`, `office_no`) VALUES
('Prof. Aparna Bhonde', '8899774455', 'bhonde.aparna@gmail.com', 'DMCE, Airoli', '252525');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Prasad', 'prasad@g.com', '$2y$10$yj4II43nrQToxiapOjJhmuhLKvb8U8ZeBqYHf3nMfnW1C2f7PAEbW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `datapoints`
--
ALTER TABLE `datapoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `offer_ibfk_1` (`pid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datapoints`
--
ALTER TABLE `datapoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `students` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;