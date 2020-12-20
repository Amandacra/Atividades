-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(100) NOT NULL,
  `cidade_estado` int(11) NOT NULL,
  `cidade_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cod_cidade`, `nome_cidade`, `cidade_estado`, `cidade_pais`) VALUES
(8, 'Araraquara', 12, 6),
(10, 'São Carlos', 12, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `cod_estado` int(11) NOT NULL,
  `nome_estado` varchar(100) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `pais_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`cod_estado`, `nome_estado`, `sigla`, `pais_estado`) VALUES
(12, 'São Paulo', 'sp', 6),
(13, 'DinaRuap', 'dr', 11),
(14, 'São Carlos', 'SC', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `cod_pais` int(11) NOT NULL,
  `nome_pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`cod_pais`, `nome_pais`) VALUES
(6, 'Brasil '),
(11, 'Argentina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `permissao` int(2) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `permissao`, `Nome`) VALUES
(1, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1, 'Administradora Amanda'),
(3, 'amanda@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'Amanda Anc'),
(4, 'christian@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'Christian');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cidade`),
  ADD KEY `cidade_estado` (`cidade_estado`),
  ADD KEY `cidade_ibfk_2` (`cidade_pais`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cod_estado`),
  ADD KEY `pais_estado` (`pais_estado`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`cod_pais`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cod_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `cod_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `cod_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`cidade_estado`) REFERENCES `estado` (`cod_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cidade_ibfk_2` FOREIGN KEY (`cidade_pais`) REFERENCES `pais` (`cod_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`pais_estado`) REFERENCES `pais` (`cod_pais`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
