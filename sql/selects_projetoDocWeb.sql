/*Selects utilizados no Projeto:*/
select cliente.nome, cliente.codcliente, contato.telefone1 from cliente left join contato on cliente.codcliente = contato.codcliente order by cliente.nome
