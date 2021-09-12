$('#cep').mask('99999-999')
    
const URL = 'http://localhost/Teste-Netwish'

/**Preenchimento da tabela via ajax */
const todosRegistros = () => {
    let table 
    $('#tabelaCorrespondencia').find('tbody').find('tr').remove()

    $.ajax({
        url:`${URL}/api/api.php`,
        dataType:'json',
        method:'GET'
    }).done((data)=>{
        if (data != '') {

            table = data.map((items) => {
                return tr = `<tr>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registro"
                                onclick="editarRegistro(this)" data-id="${items.id}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="ExcluirRegistro(this)" data-id="${items.id}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                    <td>${items.date_create}</td>
                    <td>${items.data}</td>
                    <td>${items.empresa}</td>
                    <td>${items.ac}</td>
                    <td>${items.cep}</td>
                    <td>${items.codigo}</td>
                    <td>${items.pessoa}</td>
                    </tr>`
            })

        } else {
            table = `<tr>
                        <td colspan="8" style="font-weight:700; text-align:center">
                        Nenhum registro foi encontrado</td>
                    </tr>`
        }

        $('#tabelaCorrespondencia').bind('tbody').append(table)
    })
}

/**Esse evento salvar no banco como atualizar a tabela do banco */
$('#salvar').on('click',() => {

    let id = $('#idCorrespondencia').val()
    let nomeEmpresa = $('#nomeEmpresa').val()
    let acDestinatario = $('#acDestinatario').val()
    let cep = $('#cep').val()
    let logradouro = $('#logradouro').val()
    let cidade = $('#cidade').val()
    let numero = $('#numero').val()
    let estado = $('#estado').val()
    let complemento = $('#complemento').val()
    let pessoaResponsavel = $('#pessoaResponsavel').val()
    let tipo = $('#tipo').val()
    let ar = $('#ar').val()
    let dataEnvio = $('#dataEnvio').val()
    let codigoRastreio = $('#codigoRastreio').val()
    let usuario = $('#usuario').val()

    if (id === '') {
        
        $.ajax({
            url:`${URL}/api/api.php`,
            data:{
                nomeEmpresa:nomeEmpresa,
                acDestinatario:acDestinatario,
                cep:cep,
                logradouro:logradouro,
                cidade:cidade,
                numero:numero,
                estado:estado,
                complemento:complemento,
                pessoaResponsavel:pessoaResponsavel,
                tipo:tipo,
                ar:ar,
                dataEnvio:dataEnvio,
                codigoRastreio:codigoRastreio,
                usuario:usuario
            },
            dataType:'json',
            method:'POST'
        }).done((data) => {
            messagem(data,'Cadastro','Os dados foram cadastrado com sucesso!')
        })

    } else {
        $.ajax({
            url:`${URL}/api/api.php`,
            data:{
                id:id,
                nomeEmpresa:nomeEmpresa,
                acDestinatario:acDestinatario,
                cep:cep,
                logradouro:logradouro,
                cidade:cidade,
                numero:numero,
                estado:estado,
                complemento:complemento,
                pessoaResponsavel:pessoaResponsavel,
                tipo:tipo,
                ar:ar,
                dataEnvio:dataEnvio,
                codigoRastreio:codigoRastreio,
                usuario:usuario
            },
            dataType:'json',
            method:'PUT'
        }).done((data)=>{
           messagem(data,'Atualizado','Os dados foram atualizado com sucesso!')
        })
    }
})

const editarRegistro = (obj) => {
    let id = $(obj).attr('data-id')
    $('#modalLabelTitle').text('Editar Registro')
    
    $.ajax({
        url:`${URL}/api/api.php`,
        data:{id:id},
        dataType:'json',
        method:'GET'
    }).done((data) => {
        
        $('#nomeEmpresa').val(data.nome_empresa)
        $('#idCorrespondencia').val(data.id_correspondencia)
        $('#acDestinatario').val(data.a_c)
        $('#cep').val(data.cep)
        $('#logradouro').val(data.logradouro)
        $('#cidade').val(data.cidade)
        $('#numero').val(data.numero)
        $('#estado').val(data.estado)
        $('#complemento').val(data.complemento)
        $('#pessoaResponsavel').val(data.pessoa_responsavel)
        $('#tipo').val(data.tipo)
        $('#ar').val(data.ar)
        $('#dataEnvio').val(data.data_envio)
        $('#codigoRastreio').val(data.codigo_rastreio)
        $('#usuario').val(data.usuario)
    })
}

$('#novoRegistro').on('click',() => {
    $('#modalLabelTitle').text('Cadastro')
    limparCampo()
})

const limparCampo = () => {
    $('#nomeEmpresa').val('')
    $('#idCorrespondencia').val('')
    $('#acDestinatario').val('')
    $('#cep').val('')
    $('#logradouro').val('')
    $('#cidade').val('')
    $('#numero').val('')
    $('#estado').val('')
    $('#complemento').val('')
    $('#pessoaResponsavel').val('')
    $('#tipo').val('')
    $('#ar').val('')
    $('#dataEnvio').val('')
    $('#codigoRastreio').val('')
    $('#usuario').val('')
}

const ExcluirRegistro = (obj) =>{
    let id = $(obj).attr('data-id')

    Swal.fire({
        title: 'Deseja realmente excluir o registro ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, Excluir!',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:`${URL}/api/api.php`,
            data:{id:id},
            dataType:'json',
            method:'DELETE'
          }).done((data)=>{
                data ?
                    Swal.fire(
                        'Excluido!',
                        'Registro excluido com sucesso.',
                        'success'
                    ) 
                : false

                todosRegistros()
          }) 
        }
      })
}

const messagem = (value,texto,messagem) => {
    if (value) {
        Swal.fire(
            texto,
            messagem,
            'success'
        )
        $('#registro').modal('hide')
        todosRegistros()
    } else {

        Swal.fire(
            'Notificação',
            'Todos os campos precisa ser preenchido',
            'warning'
        )
    }  
}

todosRegistros()
