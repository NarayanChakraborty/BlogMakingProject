-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 03:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(4, 'Bangladesh'),
(9, 'Desktop'),
(10, 'programming'),
(11, 'Space');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `c_message` text NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`c_id`, `c_name`, `c_email`, `c_url`, `c_message`, `c_date`, `post_id`, `action`) VALUES
(1, 'fhfg', 'apu@gamil.com', '', 'bfghfh', '2015-10-08', 11, 1),
(2, 'narayan', 'narayanchakraborty1993@gmail.com', 'snchakraborty.info.com', 'Beautiful Post', '2015-10-09', 10, 1),
(3, 'Narayan', 'apu@gamil.com', 'fusionbd.com', 'Nice Post', '2015-10-09', 10, 1),
(4, 'Apu', 'narayanchakraborty1993@gmail.com', '', 'Nice Post', '2015-10-09', 11, 0),
(5, 'topu', 'topu@gmail.com', '', 'Very Good', '2015-10-09', 9, 1),
(6, 'topu', 'topu@gmail.com', '', 'Very Good', '2015-10-09', 9, 0),
(7, 'topu', 'topu@gmail.com', '', 'Very Good', '2015-10-09', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `description`) VALUES
(1, 'Copyright © 2015 SN Chakraborty.All rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_description` longtext NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tag_id` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `post_timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_description`, `post_image`, `cat_id`, `tag_id`, `post_date`, `month`, `year`, `post_timestamp`) VALUES
(3, 'C Programming', '<p>Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..Hi&nbsp; i am sree narayan chakraborty ..</p>\r\n', '3.jpg', 4, '5,3', '2015-07-05', '07', '2015', '1443391200'),
(4, 'Image Processing', '<p>In <a href="http://en.wikipedia.org/wiki/Imaging_science">imaging science</a>, <strong>image processing</strong> is any form of <a href="http://en.wikipedia.org/wiki/Signal_processing">signal processing</a> for which the input is an image, such as a <a href="http://en.wikipedia.org/wiki/Photograph">photograph</a> or <a href="http://en.wikipedia.org/wiki/Video_frame">video frame</a>; the output of image processing may be either an image or a set of characteristics or <a href="http://en.wikipedia.org/wiki/Parameter">parameters</a> related to the image. Most image-processing techniques involve treating the image as a <a href="http://en.wikipedia.org/wiki/Two-dimensional">two-dimensional</a> <a href="http://en.wikipedia.org/wiki/Signal_%28electrical_engineering%29">signal</a> and applying standard signal-processing techniques to it.</p>\r\n\r\n<p>Image processing usually refers to <a href="http://en.wikipedia.org/wiki/Digital_image_processing">digital image processing</a>, but <a href="http://en.wikipedia.org/wiki/Optical_engineering">optical</a> and <a href="http://en.wikipedia.org/wiki/Analog_image_processing">analog image processing</a> also are possible. This article is about general techniques that apply to all of them. The <em>acquisition</em> of images (producing the input image in the first place) is referred to as <a href="http://en.wikipedia.org/wiki/Imaging_science">imaging</a>.</p>\r\n\r\n<p>Closely related to image processing are <a href="http://en.wikipedia.org/wiki/Computer_graphics">computer graphics</a> and <a href="http://en.wikipedia.org/wiki/Computer_vision">computer vision</a>. In computer graphics, images are manually <em>made</em> from physical models of objects, environments, and lighting, instead of being acquired (via imaging devices such as cameras) from <em>natural</em> scenes, as in most animated movies. Computer vision, on the other hand, is often considered <em>high-level</em> image processing out of which a machine/computer/software intends to decipher the physical contents of an image or a sequence of images (e.g., videos or 3D full-body magnetic resonance scans).</p>\r\n\r\n<p>In modern sciences and technologies, images also gain much broader scopes due to the ever growing importance of scientific visualization (of often large-scale complex scientific/experimental data). Examples include <a href="http://en.wikipedia.org/wiki/Microarray">microarray</a> data in genetic research, or real-time multi-asset portfolio trading in finance.</p>\r\n', '4.jpg', 4, '1,4', '2015-08-01', '08', '2015', '1443823200'),
(5, 'Original Wordpress Themes', '<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl&nbsp; ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim,&nbsp; in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsumeget pede.&nbsp; Proin nunc. Donec massa. Nulla pulvinar, nisl ac convallis nonummy, tellus eros sodales enim,<br />\r\n&nbsp;in tincidunt mauris in odio.&nbsp; massa ac laoreet iaculipede niorpermassa,consectetuer feipsum eget pede.&nbsp;&nbsp;&nbsp; Proin nunc. Donec massa. Nulla pulvinar, nisl ac convallis nonummy, tellus eros sodales enim, in tincidunt&nbsp;&nbsp; mauris in odio. Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et,&nbsp;&nbsp;&nbsp; interdum a, tincidunt quis, libero. Aenean sit amturpis.</p>\r\n', '5.jpg', 10, '1,4,3', '2015-08-15', '08', '2015', '1443823200'),
(6, 'Computer graphics', '<p><strong>Computer graphics</strong> are <a href="http://en.wikipedia.org/wiki/Graphics">graphics</a> created using <a href="http://en.wikipedia.org/wiki/Computer">computers</a> and the representation of <a href="http://en.wikipedia.org/wiki/Image">image</a> data by a computer specifically with help from specialized graphic hardware and software.</p>\r\n\r\n<p>The interaction and understanding of computers and interpretation of data has been made easier because of computer graphics. Computer graphic development has had a significant impact on many types of media and have revolutionized <a href="http://en.wikipedia.org/wiki/Animation">animation</a>, <a href="http://en.wikipedia.org/wiki/Movies">movies</a> and the <a href="http://en.wikipedia.org/wiki/Video_game">video game</a> industry.</p>\r\n\r\n<p>The term computer graphics has been used in a broad sense to describe &quot;almost everything on computers that is not text or sound&quot;.<a href="http://en.wikipedia.org/wiki/Computer_graphics#cite_note-1">[1]</a> Typically, the term <em>computer graphics</em> refers to several different things:</p>\r\n\r\n<p>the representation and manipulation of image data by a computer</p>\r\n\r\n<p>the various <a href="http://en.wikipedia.org/wiki/Technologies">technologies</a> used to create and manipulate images</p>\r\n\r\n<p>the sub-field of <a href="http://en.wikipedia.org/wiki/Computer_science">computer science</a> which studies methods for digitally synthesizing and manipulating visual content, see <a href="http://en.wikipedia.org/wiki/Computer_graphics_%28computer_science%29">study of computer graphics</a></p>\r\n\r\n<p>Computer graphics is widespread today. Computer imagery is found on television, in newspapers, for example in weather reports, or for example in all kinds of medical investigation and surgical procedures. A well-constructed <a href="http://en.wikipedia.org/wiki/Chart">graph</a> can present complex statistics in a form that is easier to understand and interpret. In the media &quot;such graphs are used to illustrate papers, reports, thesis&quot;, and other presentation material.<a href="http://en.wikipedia.org/wiki/Computer_graphics#cite_note-ISS02-2">[2]</a></p>\r\n\r\n<p>Many powerful tools have been developed to visualize data. Computer generated imagery can be categorized into several different types: two dimensional (2D), three dimensional (3D), and animated graphics. As technology has improved, 3D computer graphics have become more common, but 2D computer graphics are still widely used. Computer graphics has emerged as a sub-field of <a href="http://en.wikipedia.org/wiki/Computer_science">computer science</a> which studies methods for digitally synthesizing and manipulating visual content. Over the past decade, other specialized fields have been developed like <a href="http://en.wikipedia.org/wiki/Information_visualization">information visualization</a>, and <a href="http://en.wikipedia.org/wiki/Scientific_visualization">scientific visualization</a> more concerned with &quot;the visualization of <a href="http://en.wikipedia.org/wiki/Three-dimensional_space">three dimensional</a> phenomena (architectural, meteorological, medical, <a href="http://en.wikipedia.org/wiki/Biological_Data_Visualization">biological</a>, etc.), where the emphasis is on realistic renderings of volumes, surfaces, illumination sources, and so forth, perhaps with a dynamic (time) component&quot;.<a href="http://en.wikipedia.org/wiki/Computer_graphics#cite_note-MF08-3">[3]</a></p>\r\n', '6.jpg', 9, '1,4,3', '2015-09-03', '09', '2015', '1443823200'),
(7, 'Humanâ€“computer interaction (HCI)', '<p><strong>Human&ndash;computer interaction</strong> (<strong>HCI</strong>) involves the study, planning, design and uses of the interaction between people (<a href="http://en.wikipedia.org/wiki/User_%28computing%29">users</a>) and computers. It is often regarded as the intersection of <a href="http://en.wikipedia.org/wiki/Computer_science">computer science</a>, <a href="http://en.wikipedia.org/wiki/Behavioral_sciences">behavioral sciences</a>, <a href="http://en.wikipedia.org/wiki/Design">design</a>, <a href="http://en.wikipedia.org/wiki/Media_studies">media studies</a>, and <a href="http://en.wikipedia.org/wiki/Outline_of_human%E2%80%93computer_interaction#Related_fields">several other fields of study</a>. The term was popularized by Card, Moran, and Newell in their seminal 1983 book, <em>The Psychology of Human-Computer Interaction</em>, although the authors first used the term in 1980,<a href="http://en.wikipedia.org/wiki/Human%E2%80%93computer_interaction#cite_note-The_keystroke-level_model_for_user_performance_time_with_interactive_systems-1">[1]</a> and the first known use was in 1975.<a href="http://en.wikipedia.org/wiki/Human%E2%80%93computer_interaction#cite_note-Evaluating_the_impact_of_office_automation_on_top_management_communication-2">[2]</a> The term connotes that, unlike other tools with only limited uses (such as a hammer, useful for driving nails, but not much else), a computer has many affordances for use and this takes place in an open-ended dialog between the user and the computer.</p>\r\n\r\n<p>Humans interact with computers in many ways, and the interface between humans and the computers they use is crucial to facilitating this interaction. Desktop applications, internet browsers, handheld computers, and computer kiosks make use of the prevalent Graphical User Interfaces (GUI) of today. Voice User Interfaces (VUI) are used for speech recognition and synthesizing systems, and the emerging multi-modal and gestalt User Interfaces (gUI) allow humans to engage with embodied character agents in a way that cannot be achieved with other interface paradigms.</p>\r\n\r\n<p><strong>Goal:</strong></p>\r\n\r\n<p>methodologies and processes for designing interfaces (i.e., given a task and a class of users, design the best possible interface within given constraints, optimizing for a desired property such as learnability or efficiency of use)</p>\r\n\r\n<p>methods for implementing interfaces (e.g. software toolkits and <a href="http://en.wikipedia.org/wiki/Library_%28computer_science%29">libraries</a>)</p>\r\n\r\n<p>techniques for evaluating and comparing interfaces</p>\r\n\r\n<p>developing new interfaces and <a href="http://en.wikipedia.org/wiki/Interaction_techniques">interaction techniques</a></p>\r\n\r\n<p>developing descriptive and predictive models and theories of interaction</p>\r\n', '7.jpg', 10, '2,4,3', '2015-09-23', '09', '2015', '1443823200'),
(8, 'Television', '<p>px; &quot;&gt; &lt;<strong>Development of Television</strong><br />\r\nTelevision* means &lsquo;to see from a distance&rsquo;. The desire in man to do so has been there for ages.<br />\r\nIn the early years of the twentieth century many scientists experimented with the idea of<br />\r\nusing selenium photosensitive cells for converting light from pictures into electrical signals<br />\r\nand transmitting them through wires.<br />\r\nThe first demonstration of actual television was given by J.L. Baird in UK and C.F.<br />\r\nJenkins in USA around 1927 by using the technique of mechanical scanning employing rotating<br />\r\ndiscs. However, the real breakthrough occurred with the invention of the cathode ray tube and<br />\r\nthe success of V.K. Zworykin of the USA in perfecting the first camera tube (the iconoscope)<br />\r\nbased on the storage principle. By 1930 electromagnetic scanning of both camera and picture<br />\r\ntubes and other ancillary circuits such as for beam deflection, video amplification, etc. were<br />\r\ndeveloped. Though television broadcast started in 1935, world political developments and the<br />\r\nsecond world war slowed down the progress of television. With the end of the war, television<br />\r\nrapidly grew into a popular medium for dispersion of news and mass entertainment.<br />\r\n<strong>Television Systems</strong><br />\r\nAt the outset, in the absence of any international standards, three monochrome (<em>i.e</em>. black and<br />\r\nwhite) systems grew independently. These are the 525 line American, the 625 line European<br />\r\nand the 819 line French systems. This naturally prevents direct exchange of programme between<br />\r\ncountries using different television standards. Later, efforts by the all world committee on<br />\r\nradio and television (CCIR) for changing to a common 625 line system by all concerned proved<br />\r\nineffective and thus all the three systems have apparently come to stay. The inability to change<br />\r\nover to a common system is mainly due to the high cost of replacing both the transmitting<br />\r\nequipment and the millions of receivers already in use. However the UK, where initially a 415<br />\r\nline monochrome system was in use, has changed to the 625 line system with some modification<br />\r\nin the channel bandwidth. In India, where television transmission started in 1959, the 625-B<br />\r\nmonochrome system has been adopted.<br />\r\nThe three different standards of black and white television have resulted in the<br />\r\ndevelopment of three different systems of colour television, respectively compatible with the<br />\r\nthree monochrome systems. The original colour system was that adopted by the USA in 1953<br />\r\non the recommendations of its National Television Systems Committee and hence called the<br />\r\nNTSC system. The other two colour systems&ndash;PAL and SECAM are later modifications of the<br />\r\nNTSC system, with minor improvements, to conform to the other two monochrome standards.<br />\r\n2<br />\r\n*From the Greek <em>tele </em>(= far) and the Latin <em>visionis </em>(from <em>videre </em>= to see).<br />\r\nC-4\\N-MONO\\MON0-1<br />\r\nINTRODUCTION 3<br />\r\nRegular colour transmission started in the USA in 1954. In 1960, Japan adopted the<br />\r\nNTSC system, followed by Canada and several other countries. The PAL colour system which<br />\r\nis compatible with the 625 line monochrome European system, and is a variant of the NTSC<br />\r\nsystem, was developed at the Telefunken Laboratories in the Federal Republic of Germany<br />\r\n(FRG). This system incorporates certain features that tend to reduce colour display errors that<br />\r\noccur in the NTSC system during transmission. The PAL system was adopted by FRG and UK<br />\r\nin 1967. Subsequently Australia, Spain, Iran and several other countries in West and South<br />\r\nAsia have opted for the PAL system. Since this system is compatible with the 625-B monochrome<br />\r\nsystem, India also decided to adopt the PAL system. The third colour TV system in use is the<br />\r\nSECAM system. This was initially developed and adopted in France in 1967. Later versions,<br />\r\nknown as SECAM IV and SECAM V were developed at the Russian National Institute of<br />\r\nResearch (NIR) and are sometimes referred to as the NIR-SECAM systems. This system has<br />\r\nbeen adopted by the USSR, German Democratic Republic, Hungary, some other East European<br />\r\ncountries and Algeria. When both the quality of reproduction and the cost of equipment are<br />\r\ntaken into account, it is difficult to definitely establish the superiority of any one of these<br />\r\nsystems over the other two. All three systems have found acceptance in their respective<br />\r\ncountries. The deciding factor for adoption was compatibility with the already existing<br />\r\nmonochrome system.</p>\r\n', '8.jpg', 4, '4,3', '2015-10-01', '10', '2015', '1443909600'),
(9, 'Signal Bandwidth', '<p>The complete <em>signal bandwidth </em>of a TV signal is shown in Fig. 23-1. The entire TV<br />\r\nsignal occupies a channel in the spectrum with a bandwidth of 6 MHz. There are two<br />\r\ncarriers, one each for the picture and the sound.<br />\r\nAudio Signal. The sound carrier is at the upper end of the spectrum. Frequency modulation is used to impress the sound signal on the carrier. The audio bandwidth of the<br />\r\nsignal is 50 Hz to 15 kHz. The maximum permitted frequency deviation is 25 kHz, considerably less than the deviation permitted by conventional FM broadcasting. As a result,<br />\r\na TV sound signal occupies somewhat less bandwidth in the spectrum than a standard<br />\r\nFM broadcast station. Stereo sound is also available in TV, and the multiplexing method<br />\r\nused to transmit two channels of sound information is virtually identical to that used in<br />\r\nstereo transmission for FM broadcasting.<br />\r\nVideo Signal. The picture information is transmitted on a separate carrier located<br />\r\n4.5 MHz lower in frequency than the sound carrier (refer again to Fig. 23-1). The video<br />\r\nsignal derived from a camera is used to amplitude-modulate the picture carrier. Different methods of modulation are used for both sound and picture information so that there<br />\r\nis less interference between the picture and sound signals. Further, amplitude modulation of the carrier takes up less bandwidth in the spectrum, and this is important when<br />\r\na high-frequency, content-modulating signal such as video is to be transmitted.<br />\r\nNote in Fig. 23-1 that vestigial sideband AM is used. The full upper sidebands of the<br />\r\npicture information are transmitted, but a major portion of the lower sidebands is suppressed to conserve spectrum space. Only a vestige of the lower sideband is transmitted.<br />\r\nThe color information in a picture is transmitted by way of frequency-division multiplexing techniques. Two color signals derived from the camera are used to modulate a<br />\r\n3.85-MHz subcarrier which, in turn, modulates the picture carrier along with the main<br />\r\nvideo information. The color subcarriers use double-sideband suppressed carrier AM.<br />\r\nThe video signal can contain frequency components up to about 4.2 MHz. Therefore, if both sidebands were transmitted simultaneously, the picture signal would occupy<br />\r\n&nbsp;</p>\r\n', '9.jpg', 9, '1,4,3', '2015-10-04', '10', '2015', '1443909600'),
(10, 'Picture Tube', '<p>A picture tube is a vacuum tube called a <em>cathode-ray tube (CRT )</em>. Both monochrome<br />\r\n(B&amp;W) and color picture tubes are available. The CRT used in computer video monitors works as the TV picture tube described here.<br />\r\nMonochrome CRT. The basic operation of a CRT is illustrated with a monochrome<br />\r\ntube, as shown in Fig. 23-16(<em>a</em>). The tube is housed in a bell-shaped glass enclosure. A<br />\r\nfilament heats a cathode which emits electrons. The negatively charged electrons are<br />\r\nattracted and accelerated by positive-bias voltages on the elements in an electron gun<br />\r\nassembly. The electron gun also focuses the electrons into a very narrow beam. A control grid that is made negative with respect to the cathode controls the intensity of the<br />\r\nelectron beam and the brightness of the spot it makes.<br />\r\nThe beam is accelerated forward by a very high voltage applied to an internal<br />\r\nmetallic coating called <em>aquadag. </em>The <em>face, </em>or front, of the picture tube is coated internally with a phosphor that glows and produces white light when it is struck by the<br />\r\nelectron beam.<br />\r\nAround the neck of the picture tube is a structure of magnetic coils called the<br />\r\n<em>deflection yoke. </em>The horizontal and vertical current linear sawtooth waves generated by<br />\r\nthe sweep and synchronizing circuits are applied to the yoke coils, which produce magnetic fields inside the tube that influence the position of the electron beam. When<br />\r\nelectrons flow, a magnetic field is produced around the conductor through which the<br />\r\ncurrent flows. The magnetic field that occurs around the electron beam is moved or<br />\r\ndeflected by the magnetic field produced by the deflection coils in the yoke. Thus the<br />\r\nelectron beam is swept across the face of the picture tube in the interlaced manner<br />\r\ndescribed earlier.<br />\r\nAs the beam is being swept across the face of the tube to trace out the scene, the<br />\r\nintensity of the electron beam is varied by the luminance, or <em>Y, </em>signal, which is applied<br />\r\nto the cathode or in some cases to the control grid. The <em>control grid </em>is an element in the<br />\r\nelectron gun that is negatively biased with respect to the cathode. By varying the grid<br />\r\nvoltage, the beam can be made stronger or weaker, thereby varying the intensity of the<br />\r\nlight spot produced by the beam when it strikes the phosphor. Any shade of gray, from<br />\r\nwhite to black, can be reproduced in this way.<br />\r\nColor CRT. The operation of a color picture tube is similar to that just described.<br />\r\nTo produce color, the inside of the picture tube is coated with many tiny red, green,<br />\r\nand blue phosphor dots arranged in groups of three, called <em>triads. </em>Some tubes use a<br />\r\npattern of red, green, and blue stripes. These dots or stripes are energized by three<br />\r\nseparate cathodes and electron guns driven by the red, green, and blue color signals.<br />\r\nFigure 23-16(<em>b</em>) shows how the three electron guns are focused so that they strike only<br />\r\nthe red, green, and blue dots as they are swept across the screen. A metallic plate with<br />\r\nholes for each dot triad called a <em>shadow mask </em>is located between the guns and the<br />\r\nphosphor dots to ensure that the correct beam strikes the correct color dot. By varying the intensity of the color beams, the dot triads can be made to produce any color.<br />\r\nThe dots are small enough that the eye cannot see them individually at a distance.<br />\r\nWhat the eye sees is a color picture swept out on the face of the tube.<br />\r\nFigure 23-17 shows how all the signals come together at the picture tube to produce<br />\r\nthe color picture. The <em>R, G, </em>and <em>B </em>signals are mixed with the <em>Y </em>signal to control the<br />\r\ncathodes of the CRT. Thus the beams are properly modulated to reproduce the color<br />\r\npicture. Note the various controls associated with the picture tube. The <em>R-G-B </em>screen,<br />\r\nbrightness, focus, and centering controls vary the dc voltages that set the levels as desired.<br />\r\n&nbsp;</p>\r\n', '10.jpg', 9, '1,4', '2015-10-04', '10', '2015', '1443909600'),
(11, 'Framing', '<p>Data transmission in the physical layer means moving bits in the form of a signal from the source to the destination. The physical layer provides bit synchronization to ensure that the sender and receiver use the same bit durations and timing. The data link layer, on the other hand, needs to pack bits into frames, so that each frame is distinguishable from another. Our postal system practices a type of framing. The simple act of inserting a letter into an envelope separates one piece of information from another; the envelope serves as the delimiter. In addition, each envelope defines the sender and receiver addresses since the postal system is a many-to-many carrier facility.<br />\r\n&nbsp;Framing in the data link layer separates a message from one source to a destination, or from other messages to other destinations, by adding a sender address and a destination address. The destination address defines where the packet is to go; the sender address helps the recipient acknowledge the receipt. Although the whole message could be packed in one frame, that is not normally done. One reason is that a frame can be very large, making flow and error control very inefficient. When a message is carried in one very large frame, even a single-bit error would require the retransmission of the whole message. When a message is divided into smaller frames, a single-bit error affects only that small frame.<br />\r\nFixed-Size Framing Frames can be of fixed or variable size. In fixed-size framing, there is no need for defining the boundaries of the frames; the size itself can be used as a delimiter. An example of this type of framing is the ATM wide-area network, which uses frames of fixed size called cells. We discuss ATM in Chapter 18.<br />\r\nVariable-Size Framing Our main discussion in this chapter concerns variable-size framing, prevalent in localarea networks. In variable-size framing, we need a way to define the end of the frame and the beginning of the next. Historically, two approaches were used for this purpose: a character-oriented approach and a bit-oriented approach.<br />\r\n<em>Character-Oriented Protocols</em> In a character-oriented protocol, data to be carried are 8-bit characters from a coding system such as ASCII (see Appendix A). The header, which normally carries the source and destination addresses and other control information, and the trailer, which carries error detection or error correction redundant bits, are also multiples of 8 bits. To separate one frame from the next, an 8-bit (I-byte) flag is added at the beginning and the end of a frame. The flag, composed of protocol-dependent special characters, signals the start or end of a frame.<br />\r\n&nbsp;</p>\r\n', '11.png', 10, '1,4', '2015-10-07', '10', '2015', '1444168800');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`tag_id`, `tag_name`) VALUES
(1, 'Computer'),
(2, 'Medical'),
(3, 'Technology'),
(4, 'Science');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
