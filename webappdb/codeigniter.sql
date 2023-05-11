-- Generation Time: Feb 05, 2018 at 07:10 AM

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `userpass` varchar(40) NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userpass`) VALUES
(1, 'demo', 'demo');

