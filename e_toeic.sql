-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 17. Juli 2017 jam 01:10
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_toeic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivasi_email`
--

CREATE TABLE IF NOT EXISTS `aktivasi_email` (
  `kode_verifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_verifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `aktivasi_email`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `chat` text NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `chat`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `file`) VALUES
(1, 'Audio 1-10.mp3'),
(2, '2.jpg'),
(3, '1.jpg'),
(4, '3.png'),
(5, '4.jpg'),
(6, '6.jpg'),
(7, '5.jpg'),
(8, '7.jpg'),
(9, '8.bmp'),
(10, '9.jpg'),
(11, '10.jpg'),
(12, 'text 1.png'),
(13, 'Conversation 41-70.mp3'),
(14, 'Photograph 1-10.mp3'),
(17, 'toeic 1.jpg'),
(18, 'toeic 2.jpg'),
(19, 'toeic 3.jpg'),
(20, 'toeic 4.jpg'),
(21, 'toeic 5.jpg'),
(22, 'toeic 6.jpg'),
(23, 'toeic 7.jpg'),
(24, 'toeic 8.jpg'),
(25, 'toeic 9.jpg'),
(26, 'toeic 10.jpg'),
(34, 'Question-Response 11-40.mp3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `latihan_soal`
--

CREATE TABLE IF NOT EXISTS `latihan_soal` (
  `id_latihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` text NOT NULL,
  `id_materi` varchar(11) NOT NULL,
  `id_soal_materi` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `keterangan` enum('Benar','Salah') NOT NULL,
  `status` enum('','Complete') NOT NULL,
  PRIMARY KEY (`id_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `latihan_soal`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `leaderboard`
--

CREATE TABLE IF NOT EXISTS `leaderboard` (
  `id_leaderboard` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` text NOT NULL,
  `tipe_test` varchar(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `badge` text NOT NULL,
  PRIMARY KEY (`id_leaderboard`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `leaderboard`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `email`, `level`, `photo`) VALUES
(1, 'ferinugroho', '20122017', '', 'ferinugrohome@gmail.com', 'admin', ''),
(2, 'hmjmi', 'misti', '', 'mistikurnia@gmail.com', 'admin', ''),
(3, 'kiki', 'kiki', '', 'ferinugrohome@gmail.com', 'user', ''),
(4, 'koko', 'koko', '', 'friski26viko@gmail.com', 'user', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` varchar(11) NOT NULL,
  `isi_materi` text NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `isi_materi`) VALUES
('meeting1', '<p style="text-align: center;"><strong>Meeting 1 : Tips Listening Comprehension, Strategies And Practice</strong></p>\r\n<p><strong>A. Listening Comprehension</strong></p>\r\n<p>&nbsp; &nbsp; The Listening Comprehension Section consists of 1-100 questions of the TOEIC test and is delivered by an audiocassette tape or a CD. It is devided into four parts:</p>\r\n<p>&nbsp; &nbsp;1. Photographs</p>\r\n<p>&nbsp; &nbsp;2. Question and Response</p>\r\n<p>&nbsp; &nbsp;3. Short Conversations</p>\r\n<p>&nbsp; &nbsp;4. Short Talks</p>\r\n<p>&nbsp;</p>\r\n<p>An anouncer will introduce a variety of statements, questions, short conversations, and short talks recorded in English. You will then answer questions based on your understanding of the recording. You will not be able to stop the recording, but there will be pause of 5-8 seconds between questions to give you the time to answer.</p>\r\n<p>Each recorded statement will be read one time only. The Listening Comprehension Section takes about 45 minutes to complete. Here are some tips for improving your ability to take the Listening Comprehension test successfully.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>1. Tips 1:</strong> Pay attention to words that are stressed</p>\r\n<p>Pay attention to the stressed words in the Listening Comprehension Section. In spoken English, certain words in a sentence are stressed. That is, some parts of a spoken sentence are pronounced with some emphasis than other parts of the sentence. The stressed word are usually the words that contain the most important information, such as nouns verbs, and adjectives. Other words in a sentence are pronounced with little or no distinction. Very often, these are words that contain less information but contribute to the grammar of the sentence, such as the articles a and the, pronouns (<em>he, she, they</em> etc.), prepositions (<em>in, on, with, over</em> etc.), conjunctions (<em>but, because, since</em> etc.), and auxiliry verbs (<em>can, be, will, should</em> etc.).</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Example:</strong> <em>The doctor and a nurse are talking with a patient.</em>&nbsp;</p>\r\n<p><br />&nbsp;In spoken English, the sentence above would most likely be stressed in four places: on the nouns <strong><em>doctor, nurse,</em></strong> and <strong><em>patient</em></strong> and on the verb<strong><em> talking</em></strong>. The arrows indicated the words that are stressed when the sentence are spoken.</p>\r\n<p>&nbsp;</p>\r\n<p><em>The doctor and a <span style="text-decoration: underline;">nurse</span> are <span style="text-decoration: underline;">talking</span> with a <span style="text-decoration: underline;">patient</span>.</em></p>\r\n<p>&nbsp;</p>\r\n<p>The words that have little or no stress are the article <strong><em>the</em></strong> and <strong><em>a</em></strong>, the conjunction <strong><em>and</em></strong>, the auxiliary verbs<strong><em> are</em></strong>, and the preposition <strong><em>with</em></strong>. If you hear only the stressed words in this sentence, you can probably still understand what the sentence is about. The stressed words give you the main idea.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. Tips 2:</strong> Prepare yourself for authentic English speech</p>\r\n<p>In the Listening Comprehension Section, you will hear both male and female native speakers of English. They will speak at a normal rate of speech, using both formal and informal speech. Here are some examples of informal and formal English.</p>\r\n<p>&nbsp;</p>\r\n<p><img src="upload/text 1.png" alt="" width="567" height="222" /></p>\r\n<p>&nbsp;</p>\r\n<p>The conversations and statements that you will hear in this part of the test are examples of English as it is spoken in work, leisure, and personal situations around the world.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>3. Tips 3:&nbsp;</strong>Listen carefully to the recording before choosing an answer</p>\r\n<p>&nbsp; &nbsp; In order to choose the correct answer in the Listening Comprehension Section, it is usually necessary to listen to the entire recording for that question. Clues to the right answer can be at the beginning, middle, or end of the recorded materials.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>1. Part 1: Photograph</strong></p>\r\n<p>Some suggestions for improving your ability to make the best choice:</p>\r\n<p><strong>a. Tips 1:</strong> Take a quick look at the photograph before you hear the four statements</p>\r\n<p>&nbsp; &nbsp; Example: Ask yourself these question: - Where was it taken?</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - What is the main subject?</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - What is happening?</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Who are the people?</p>\r\n<p>&nbsp;</p>\r\n<p><strong>b. Tips 2:&nbsp;</strong>Pay attention to similiar-sounding words with different meanings</p>\r\n<p>&nbsp; &nbsp; Example:</p>\r\n<p>&nbsp; &nbsp; <em>They''re <span style="text-decoration: underline;">walking</span> in a garden. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; She''s <span style="text-decoration: underline;">setting</span> the table.</em></p>\r\n<p><em>&nbsp; &nbsp; They''re&nbsp;<span style="text-decoration: underline;">working</span> in a garden &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;She''s <span style="text-decoration: underline;">sitting</span> at the table.</em></p>\r\n<p>&nbsp;</p>\r\n<p><em>Walking/working&nbsp;</em>and&nbsp;<em>setting/sitting</em> sound familiar but have very different meanings.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>c. Tips 3:</strong> Listen carefully to each complete statement about the photograph</p>\r\n<p>&nbsp; &nbsp; Statements about a photograph may contain parts that are true. Listen carefully to determine if entire statement, or only part of it, is true.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Example:</strong> <em>He''s adjusting the dials on a television set.</em></p>\r\n<p>&nbsp;</p>\r\n<p>While it is true that the man is adjusting dials, there is no dials, there is no television set in the picture. Therefore the sentence in the example is not entirely accurate description of what you see in the picture.</p>'),
('meeting10', '<p style="text-align: center;"><strong>Meeting 10: Clausa, Conditionals, And Participles</strong></p>'),
('meeting11', '<p style="text-align: center;"><strong>Meeting 11: Tenses</strong></p>'),
('meeting12', '<p style="text-align: center;"><strong>Meeting 12: Subject:Redudant Subject, Verb: Active/Passive</strong></p>'),
('meeting2', '<p style="text-align: center;"><strong>Meeting 2: Tips Listening&nbsp;Questions - Response</strong></p>\r\n<p style="text-align: left;"><strong>Part II:&nbsp;</strong>Question - Response</p>\r\n<p style="text-align: left;">In this part of the test you will hear a question asked by one speaker, followed by three response from another speaker. You will not see any text printed in the test booklet. All three of the responses are correct English, but only one is an appropriate response to the question. three are 30 questions in the Question and Response Section, and you will have five seconds between questions. Here are some suggestions for improving your ability to select the best response in this part of the test.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>1. Tips 1:&nbsp;</strong>Focus on the purpose of the question</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; It is important to understand the purpose of the question, In English, as many languages, the response to a question does not necessarily have the same grammatical structure as the question.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example 1:&nbsp;</strong></p>\r\n<p style="text-align: left;">Who is going to be in charge of processing paychecks now?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; A. Yes, I have a credit card.</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; <strong>B. The assistant account.</strong></p>\r\n<p style="text-align: left;">&nbsp; &nbsp; C. It''s a complicated process.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Based on the grammar of the question, you might expect the answer to contain the phrase "is going to be in charge". Although choice&nbsp;<strong>B&nbsp;</strong>does not contain this phrase, it is acceptable response to the question "Who?"</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example 2:&nbsp;</strong></p>\r\n<p style="text-align: left;">A. He''s out sick today.</p>\r\n<p style="text-align: left;">B. Yes, I''m really hungry.</p>\r\n<p style="text-align: left;"><strong>C.&nbsp;I''m not sure, I just started here.</strong></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Based on the grammar of the sentence, you might expect the answer to this question to contain the phrase "It is located ....". Although choice <strong>C&nbsp;</strong>does not contain the phrase, choice C is realistic response to a request for directions. People don''t always know the answer to a question. Remember that TOEIC test questions are examples of authentic English speech.</p>\r\n<p style="text-align: left;">&nbsp;&nbsp;</p>\r\n<p style="text-align: left;"><strong>2. Tips 2:&nbsp;</strong>Listen for question words</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Listen for question words and think about word order. They usually indicate what type of response is expected. Consider the following questions and response.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example:</strong></p>\r\n<p style="text-align: left;"><em><span style="text-decoration: underline;">How</span> are we going to the party? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We are taking a taxi.</em></p>\r\n<p style="text-align: left;"><em><span style="text-decoration: underline;">When</span> is the party? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Thursday, at 4 p.m.</em></p>\r\n<p style="text-align: left;"><em><span style="text-decoration: underline;">Where</span> is the party? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;In the director''s lounge.</em></p>\r\n<p style="text-align: left;"><em>Are we going to the party? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Yes, we are.</em></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Study the use of words such as <em>how, when</em>, and <em>where</em> until you can easily predict the kind of information each word asks for. Think about question word order, too. Questions asking for a&nbsp;<em>yes&nbsp;</em>or&nbsp;<em>no&nbsp;</em>answer do not begin with a question word. For example "Are we going to the party?" could be answered with "yes" or "no", "We aren''t", or even "I''m not sure".</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>3. Tips 3:&nbsp;</strong>Pay close attention to words that sound a like</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Some choices in this part of the test will require you to hear the different between similiar-sounding words.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example:</strong></p>\r\n<p style="text-align: left;">What is the fare to the airport?</p>\r\n<p style="text-align: left;">Incorrect -&gt; *&nbsp;<em>That''s a fair price</em></p>\r\n<p style="text-align: left;">Correct &nbsp; -&gt; <em>About 12 dollars</em></p>\r\n<p style="text-align: left;">Although&nbsp;<em>fair</em> and&nbsp;<em>fare&nbsp;</em>sound the same, their meanings are very different. This question is asking about a specific amount of money.</p>'),
('meeting3', '<p style="text-align: center;"><strong>Meeting 3:</strong>&nbsp;<strong>Tips Listening Short Conversations</strong></p>\r\n<p style="text-align: left;"><strong>Part III:&nbsp;</strong>Short Conversations</p>\r\n<p style="text-align: left;">In this part of the test, you will hear short conversations between two people. You will not see the text of the comversations between two people. You will not see the text of the conversations in the test book. The conversations will consist of authentic examples of spoken English. In the test book, you will see a written question about each and four written responses for each question. You should choose the best answer from the four chouces. You will have eight second between each conversation. There are 30 questions in the Short Conversation Section. Here are some suggestions for improving your ability to select the best answer in this part of the test.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>1. Tips 1:&nbsp;</strong>Read the question first</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Try to read each question before you listen to the conversation. If you have time, quickly read the four choice too. Reading the question first can help you to focus your listening and may give you some idea of what the conversation is about.</p>\r\n<p style="text-align: left;">Consider the following question: <em>Where are the speakers?</em></p>\r\n<p style="text-align: left;">After reading question, you can see that you need to find out&nbsp;<em>Where&nbsp;</em>the speakers are. You can then listen to the conversation for clues as to where the speakers would be.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example 1:&nbsp;</strong></p>\r\n<p style="text-align: left;">On the recording, you will hear:</p>\r\n<p style="text-align: left;">Man 1: Are you ready to order, sir?</p>\r\n<p style="text-align: left;">Man 2: I just need a few minutes to read the menu.</p>\r\n<p style="text-align: left;">Man 1: No problem. I''ll be back in a moment to tell you the daily specials.</p>\r\n<p style="text-align: left;">In your test book, you will read:</p>\r\n<p style="text-align: left;">Where are the speakers?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;A. At a library</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;B. At a supermarket</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;C. At a restaurant</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;D. At a movie theater</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">When listening for the clues, you might pick out the following words and expressions:</p>\r\n<p style="text-align: left;"><em>&nbsp; &nbsp; &nbsp;ready to order</em> &nbsp; &nbsp; (the first speaker is going to order)</p>\r\n<p style="text-align: left;"><em>&nbsp; &nbsp; &nbsp;menu</em> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(a menu found in a restaurant)</p>\r\n<p style="text-align: left;"><em>&nbsp; &nbsp; &nbsp;daily specials</em> &nbsp; &nbsp; &nbsp; ( restaurants often have daily specials)</p>\r\n<p style="text-align: left;">Certain clues about where the speakers help you to eliminate choices (A), (B), and (D).</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Now read the following questions: What does the women to do?</p>\r\n<p style="text-align: left;">By reading this question before you hear the conversation, you can listen for&nbsp;<em>what&nbsp;</em>the women wants.</p>\r\n<p style="text-align: left;">You don''t need to know the people are, who they are, or what the woman is doing.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example 2:</strong></p>\r\n<p style="text-align: left;">On recording you will hear:</p>\r\n<p style="text-align: left;">Woman &nbsp; : Is that today''s paper? I want to see if our advertisement <em>is in it</em>.</p>\r\n<p style="text-align: left;">Man &nbsp; &nbsp; &nbsp; &nbsp;: No, this is yesterday''s, Today''s hasn''t come yet.</p>\r\n<p style="text-align: left;">Woman &nbsp; : Oh, I''ll call downstairs and see if they have a copy.</p>\r\n<p style="text-align: left;">In your test book, you will read:</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; A. Put an advertisement in the paper</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; B. Order a newspaper subscription</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; C. Have some photocopies made</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; D. Check the paper for an advertisement.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>2. Tips 2:&nbsp;</strong>Try to imagine the setting of the conversation and who is speaking</p>\r\n<p style="text-align: left;">As you listen to the conversation, ask yourself the following questions:&nbsp;</p>\r\n<p style="text-align: left;">- Where are the speakers?</p>\r\n<p style="text-align: left;">- What are they doing?</p>\r\n<p style="text-align: left;">- Who are they?</p>\r\n<p style="text-align: left;">- What is their relationship?</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">In addition, the question written in the test book can often help you to determine the setting of the conversation. For example from the question: <em>Who mailed the reports </em>-&gt; you might guess that speakers work in an office.<em>&nbsp;</em></p>\r\n<p style="text-align: left;">Certain vocabulary words in the conversation can also help you figure out the setting. For example if you hear the following words:</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; &nbsp;<em>assembly line &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;plant supervisor &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; shift &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;foreman</em></p>\r\n<p style="text-align: left;"><em>&nbsp; &nbsp; &nbsp; &nbsp;technicians &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; production line</em></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">You might guess that the setting of the conversation is a factory or production facility of some kind.</p>\r\n<p style="text-align: left;">If you hear the following vocabulary:</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; &nbsp;<em>patient &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x-ray &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; doctor</em></p>\r\n<p style="text-align: left;"><em>&nbsp; &nbsp; &nbsp;&nbsp;</em>exam &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;appointment &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; medicine</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">&nbsp;You might guess that the conversation takes place in a hospitaly or a medical clinic. When you imagine the setting, or picture the scene of the conversation, you can prepare yourself to answer questions.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>3. Tips 3:&nbsp;</strong>Look at all four choices before answering</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Words that are spoken in the conversation often apper in the four choices. You need to determine if these repeated words provide an answer to the question or not, consider the following example:</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example:</strong></p>\r\n<p style="text-align: left;">On the recording, you will hear:</p>\r\n<p style="text-align: left;">Man &nbsp; &nbsp; &nbsp; &nbsp; : Sisca, can you give me a head with this marketing project this afternoon?</p>\r\n<p style="text-align: left;">Woman &nbsp; &nbsp;: Well, I need to finish this product proposal today, then I''m going to catch a train at 5.15.</p>\r\n<p style="text-align: left;">Man &nbsp; &nbsp; &nbsp; &nbsp; : Ok, could we start on it first thing tomorrow, then?</p>\r\n<p style="text-align: left;">In your test book, you will read:</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; A. Postpone the proposal</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; B. Hand him some papers</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; C. Tell him what time the train leaves</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; D. Help him with a project</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Choice (A) mentions the women''s proposal. It''s true that she is working on a proposal. However, the man never tells her to&nbsp;<em>delay&nbsp;</em>working on it. In choice (B), the man asks for&nbsp;<em>a hand</em>, which means to ask for help. Howeaver, he does not ask her&nbsp;<em>to hand&nbsp;</em>or&nbsp;give him anything. Choice (C) mentions what time the train leaves. The woman does mention the time of the train, but this isn''t what the man wants to know. Choice (<strong>B</strong>) is correct because he wants help, or&nbsp;<em> a hand</em>, with the project.</p>\r\n<p style="text-align: left;">&nbsp;</p>'),
('meeting4', '<p style="text-align: center;"><strong>Meeting 4: Tips Listening Short Talks</strong></p>\r\n<p style="text-align: left;"><strong>Part IV:&nbsp;</strong>Short Talks</p>\r\n<p style="text-align: left;">In this part of the test. You will hear several short talks. Each talk is read by one speaker only and will be read one time only. The talks consist of authentic examples of spoken English from workplace, travel, and leisure situations. These talks will vary in level of formality and will include announcements, short speeches, and advertisements. You will not see the text of the talk printed in this test booklet, but you will see several questions about the talk, with four written responses for each question. You should select the best answer from the four choices. There are 20 questions in this part of the test and you will have eight seconds between question.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>1. Tips 1:&nbsp;</strong>Read the questions first</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Try to read the questions before you listen to the talk. Reading the question can help you to focus your listening and may give you some idea of what the talk will be about. Reading the questions can also let you know if you need to listen for general information or for details. Consider the following questions in the example below:</p>\r\n<p style="text-align: left;">a. General information questions</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; - What is the purpose of this talk?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; - Where is this talk being given?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp; - Who is the spekers?</p>\r\n<p style="text-align: left;">To find the answer to general information questions, concentrate on the main ideas of the short talk. Now consider the following questions that ask for details below:</p>\r\n<p style="text-align: left;">b. Questions about details</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;- What is the final destination of the flight?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;- How long is the flight to Lombok?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; &nbsp;- Where will the plane stop first?</p>\r\n<p style="text-align: left;">To answer questions about details, you will usually need to pay attention to specific facts, times, and dates that are given in the short talks. Now listen to the example of a short talk.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example:&nbsp;</strong></p>\r\n<p style="text-align: left;"><em>(speakers) Good afternoon and welcome aboard Garuda Flight 777 from Hongkong to Bali, with intermediate stops in Singapore and Medan. Weare preparing to depart in a few minutes. At this time, your seat belt should be returned to its full upright position and your seat belt should be fastened. Our anticipated flying time Bali is five hours and fifteen minutes. We hope you enjoy the flight.</em></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Knowing what you are listening for should for should help you answer the questions correctly.</p>\r\n<p style="text-align: left;">NOTE: <strong>Inference question</strong></p>\r\n<p style="text-align: left;">The information that you need to answer a question may not always be stated directly. You may need to make inferences, or draw conclusions, from information given in the talk. These conclusions may be about general information or specific details.</p>\r\n<p style="text-align: left;">In example 1 above, the general information question "Who is the speaker?" requires an inference. We infer from the whole talk that the speaker ia a flight attendant or air hostess. A question about specific details may be also require you to make an inference, for example, "Where will the plane stop first?" is not directly answered in the talk. However, we can infer that the first stop is Singapore, because the speaker states the flying time to that city.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>2. Tips 2:&nbsp;</strong>Listen to the whole talk before trying to answer the questions</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Althougt it''s a good idea to read the question before you hear the talk, don''t try to answer the questions until you have heard the whole talk. There may be important details at the end of the talk. You may also need to consider all the information presented to understand the main ideas or to make inferences.</p>\r\n<p style="text-align: left;">Listen to the following sample short talk to practice using tips on the previous pages, read the questions first look for main idea and details, make inference, and consider all the information before answering. All of these should be done in a very short time.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>Example: </strong></p>\r\n<p style="text-align: left;"><strong>Question number 1 and 2 refer to the following report</strong></p>\r\n<p style="text-align: left;">The Eastern Gas Company has been given permission to increase the charges for natural gas service. The revised rate for natural gas service will not be effective until June first next year. The overall increase will amount to 35 cent per cubic meter. Details of this change are available at the gas company billing office.</p>\r\n<p style="text-align: left;">1. What will increase, according to the report?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; A. The area serviced by the company</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; B. The number of company offices</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; C. The length of the billing cycles</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; D. The price of natural gas</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">The answer is choice (D). Lines 1 and 2 of the talk contain the phrase "increase, the charges for natural gas service." If you miss hearing this detail, you might hear "the revised rate" and "overall increase.... to 20 cents." All of these details will help you undersatnd that the main idea is about an increase in the price of natural gas service.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">2. When will the increase go into effect?</p>\r\n<p style="text-align: left;">&nbsp; &nbsp;A. June 1</p>\r\n<p style="text-align: left;">&nbsp; &nbsp;B. June 8</p>\r\n<p style="text-align: left;">&nbsp; &nbsp;C. June 20</p>\r\n<p style="text-align: left;">&nbsp; &nbsp;D. June 30</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">The answer is choice (A). The third line of the talk contains the phrase "June first of next years." Do not confused by other numbers you may hear in the report.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><strong>3. Tips 3:&nbsp;</strong>Pay special attention to the introduction and the first part of the talk</p>\r\n<p style="text-align: left;">&nbsp; &nbsp; Before each short talk begins, you will hear the announcer say:</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><em>Question 3 and 4 refer to the following announcement ... (or talk, advertisement, speech, etc.)</em></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">After you hear the announcer introduce the type of talk, listen very carefully to the first one or two sentences of the talk. These sentences can often help you understand who the speaker is and where the talk takes place. Understanding the setting can help you prepare for and understand the rest of the talk.</p>'),
('meeting5', '<p style="text-align: center;"><strong>Meeting 5: Noun, Pronoun, And Synonym<br /></strong></p>\r\n<p style="text-align: left;">A. Noun</p>\r\n<p style="text-align: left;">1. Noun: Count/Non-Count</p>\r\n<p>a. Noun: Singular/Plural<br />&nbsp;&nbsp; Most nouns (words that name objects/places/people) are regular. The plural of regular nouns is formed by adding <em><strong>-s </strong></em>to the base form. <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Office-Offices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee-employees&nbsp; <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Desk-desks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Car-cars<br /><br />&nbsp;&nbsp;&nbsp; However, some English nouns are irregular. They have to be changed significantly to form the plural.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; man-men&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mouse-mice<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tooth-teeth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; child- children</p>\r\n<p>&nbsp;</p>'),
('meeting6', '<p style="text-align: center;"><strong>Meeting 6: Adjective And Verb Agreement<br /></strong></p>\r\n<p style="text-align: left;">&nbsp;</p>'),
('meeting7', '<p style="text-align: center;"><strong>Meeting 7: Verb, Adverb, And Pharasal Verb<br /></strong></p>'),
('meeting8', '<p style="text-align: center;"><strong>Meeting 8: Conjunction, Gerunds And Infinitives</strong></p>'),
('meeting9', '<p style="text-align: center;"><strong>Meeting 9: Preposition And Pronouns</strong></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_materi`
--

CREATE TABLE IF NOT EXISTS `soal_materi` (
  `id_soal_materi` int(11) NOT NULL AUTO_INCREMENT,
  `id_materi` varchar(11) NOT NULL,
  `jenis_pertanyaan` enum('Listening','Reading') NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `kunci_jawaban` text NOT NULL,
  PRIMARY KEY (`id_soal_materi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `soal_materi`
--

INSERT INTO `soal_materi` (`id_soal_materi`, `id_materi`, `jenis_pertanyaan`, `pertanyaan`, `a`, `b`, `c`, `d`, `kunci_jawaban`) VALUES
(1, 'meeting1', 'Listening', '<p><audio src="upload/Audio 1-10.mp3" controls="controls"></audio></p>\r\n<p style="text-align: center;"><strong>Part 1: Photographs</strong></p>\r\n<p><strong>Directions:</strong> You will see a photograph. You will hear three statements about the photograph. Choose the statement that most closely matches the photograph and fill in the corresponding letter on your answers sheet.</p>\r\n<p>&nbsp;</p>\r\n<p>1.&nbsp;<img src="upload/1.jpg" alt="" width="400" height="284" /></p>', 'A', 'B', 'C', 'D', 'B'),
(2, 'meeting1', 'Listening', '<p>2.&nbsp;<img src="upload/2.jpg" width="400" height="159" /></p>', 'A', 'B', 'C', 'D', 'C'),
(3, 'meeting1', 'Listening', '<p>3.&nbsp;<img src="upload/3.png" alt="" width="400" height="246" /></p>', 'A', 'B', 'C', 'D', 'A'),
(4, 'meeting1', 'Listening', '<p>4.&nbsp;<img src="upload/4.jpg" alt="" width="400" height="327" /></p>', 'A', 'B', 'C', 'D', 'A'),
(5, 'meeting1', 'Listening', '<p>5.&nbsp;<img src="upload/5.jpg" alt="" width="400" height="300" /></p>', 'A', 'B', 'C', 'D', 'B'),
(6, 'meeting1', 'Listening', '<p>6.&nbsp;<img src="upload/6.jpg" alt="" width="400" height="267" /></p>', 'A', 'B', 'C', 'D', 'C'),
(7, 'meeting1', 'Listening', '<p>7.&nbsp;<img src="upload/7.jpg" alt="" width="400" height="267" /></p>', 'A', 'B', 'C', 'D', 'C'),
(8, 'meeting1', 'Listening', '<p>8.&nbsp;<img src="upload/8.bmp" alt="" width="400" height="364" /></p>', 'A', 'B', 'C', 'D', 'C'),
(9, 'meeting1', 'Listening', '<p>9.&nbsp;<img src="upload/9.jpg" alt="" width="400" height="301" /></p>', 'A', 'B', 'C', 'D', 'B'),
(10, 'meeting1', 'Listening', '<p>10.&nbsp;<img src="upload/10.jpg" alt="" width="400" height="400" /></p>', 'A', 'B', 'C', 'D', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test_toeic`
--

CREATE TABLE IF NOT EXISTS `test_toeic` (
  `id_test_toeic` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` text NOT NULL,
  `id_toeic` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `keterangan` enum('Benar','Salah') NOT NULL,
  `status` enum('','Complete') NOT NULL,
  PRIMARY KEY (`id_test_toeic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `test_toeic`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `toeic`
--

CREATE TABLE IF NOT EXISTS `toeic` (
  `id_toeic` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_toeic` enum('Listening','Reading') NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `kunci_jawaban` text NOT NULL,
  PRIMARY KEY (`id_toeic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `toeic`
--

INSERT INTO `toeic` (`id_toeic`, `jenis_toeic`, `pertanyaan`, `a`, `b`, `c`, `d`, `kunci_jawaban`) VALUES
(1, 'Listening', '<p style="text-align: center;"><strong>Part 1: Photographs</strong></p>\r\n<p style="text-align: left;"><strong>Directions:</strong> You will see a photograph. You will hear four statements about the photograph. Choose the statement that most closely matches the photograph and fill in the corresponding letter on your answer sheet.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><audio src="upload/Photograph 1-10.mp3" controls="controls"></audio></p>\r\n<p style="text-align: left;">1. <img src="upload/toeic 1.jpg" alt="" width="400" height="300" /></p>', 'A', 'B', 'C', 'D', 'C'),
(2, 'Listening', '<p>2. <img src="upload/toeic 2.jpg" alt="" width="400" height="267" /></p>', 'A', 'B', 'C', 'D', 'A'),
(3, 'Listening', '<p>3. <img src="upload/toeic 3.jpg" alt="" width="400" height="400" /></p>', 'A', 'B', 'C', 'D', 'B'),
(4, 'Listening', '<p>4. <img src="upload/toeic 4.jpg" alt="" width="400" height="239" /></p>', 'A', 'B', 'C', 'D', 'D'),
(5, 'Listening', '<p>5. <img src="upload/toeic 5.jpg" alt="" width="400" height="268" /></p>', 'A', 'B', 'C', 'D', 'C'),
(6, 'Listening', '<p>6. <img src="upload/toeic 6.jpg" alt="" width="400" height="267" /></p>', 'A', 'B', 'C', 'D', 'B'),
(7, 'Listening', '<p>7. <img src="upload/toeic 7.jpg" alt="" width="400" height="266" /></p>', 'A', 'B', 'C', 'D', 'B'),
(8, 'Listening', '<p>8. <img src="upload/toeic 8.jpg" alt="" width="400" height="267" /></p>', 'A', 'B', 'C', 'D', 'C'),
(9, 'Listening', '<p>9. <img src="upload/toeic 9.jpg" alt="" width="400" height="237" /></p>', 'A', 'B', 'C', 'D', 'B'),
(10, 'Listening', '<p>10. <img src="upload/toeic 10.jpg" alt="" width="400" height="266" /></p>', 'A', 'B', 'C', 'D', 'B'),
(11, 'Listening', '<p style="text-align: center;"><strong>Part 2: Question-Response</strong></p>\r\n<p style="text-align: left;"><strong>Part 2:</strong> You will hear a question and three possible response. Choose the response that most closely answer the question and fill in the corresponding letter on your answer sheet.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><audio src="upload/Question-Response 11-40.mp3" controls="controls"></audio></p>\r\n<p style="text-align: left;">11. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(12, 'Listening', '<p>12. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(13, 'Listening', '<p>13. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(14, 'Listening', '<p>14. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(15, 'Listening', '<p>15. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(16, 'Listening', '<p>16. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(17, 'Listening', '<p>17. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(18, 'Listening', '<p>18. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(19, 'Listening', '<p>19. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(20, 'Listening', '<p>20. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(21, 'Listening', '<p>21. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(22, 'Listening', '<p>22. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(23, 'Listening', '<p>23. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(24, 'Listening', '<p>24. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(25, 'Listening', '<p>25. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(26, 'Listening', '<p>26. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(27, 'Listening', '<p>27. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(28, 'Listening', '<p>28. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(29, 'Listening', '<p>29. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(30, 'Listening', '<p>30. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(31, 'Listening', '<p>31. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C'),
(32, 'Listening', '<p>32. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(33, 'Listening', '<p>33. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(34, 'Listening', '<p>34. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(35, 'Listening', '<p>35. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(36, 'Listening', '<p>36. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(37, 'Listening', '<p>37. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(38, 'Listening', '<p>38. <strong></strong>Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'B'),
(39, 'Listening', '<p>39. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'A'),
(40, 'Listening', '<p>40. Mark your answer on your answer sheet.</p>', 'A', 'B', 'C', 'D', 'C');
