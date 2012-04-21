<!DOCTYPE Pessoas[
    <!ELEMENT Pessoas (Item, (InformacaoPessoal)+ )*>
    <!ELEMENT InformacaoPessoal ( ( (Nome), (DataNascimento), (dataCadastro), (Cpf) )?, (Contatos*))>
    <!ELEMENT Nome(#PCDATA)>
    <!ELEMENT DataNascimento(#PCDATA) >
    <!ELEMENT dataCadastro(#PCDATA) >
    <!ELEMENT Cpf(#PCDATA) >
    
    <!ELEMENT Contatos ( ( Telefone, Celular )? , (Email, Morada)* ) >
    <!ELEMENT Telefone(#PCDATA) >
    <!ELEMENT Celular(#PCDATA) >
    <!ELEMENT Email(#PCDATA) >
    
    <!ELEMENT Morada ( ( Cep, Bairro, Endereco )? , Cidade* ) >
    <!ELEMENT Cep(#PCDATA) >
    <!ELEMENT Bairro(#PCDATA) >
    <!ELEMENT Endereco(#PCDATA) >
    <!ELEMENT Cidade(#PCDATA) > 
    
    <!ELEMENT Usuarios ( Usuario, Senha ) )>
    <!ELEMENT Usuario(#PCDATA)>
    <!ELEMENT Senha(#PCDATA) >
    
    <!ELEMENT Acesso ( Nome )? )>
    <!ELEMENT Nome(#PCDATA)>
]>