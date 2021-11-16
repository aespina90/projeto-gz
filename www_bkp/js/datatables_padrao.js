$(document).ready(function() {
    $('.datatables').dataTable({
    	"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",    	
        "iDisplayLength": 5,
    	"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ Registros por página",
            "sEmptyTable": "Não há registros para a tabela requisitada",
            "sSearch": "",            
            "sInfo": "Mostrando _START_ para _END_ de _TOTAL_ registros",
            "sInfoEmpty":"Mostrando 0 para 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ do total de registros)",
            "sZeroRecords": "Nenhum registro encontrado",
    		"oPaginate": {
    			"sPrevious": "Anterior",
    			"sNext": "Próximo"
        	}
            	
        }

    });
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Procurar...');
    $('.dataTables_length select').addClass('form-control');
});