
import {vgk}  from '/k1/libK1_Utils.js'

export var vgApp = {
	paramsXHR : {
		fase : 'alfa',
		url : 'http://' + window.location.host,
//		port : 3102,
		base : '/datos',
		otro : '',
		iam : '',
		eco : null
	},
	sqlite : {
		base   : '/shell/sqlite',
		userDB : 'usersRocks.sqlite',
		sessDB : 'sessRocks.sqlite',
		pathDB : 'apps/Rocks/sqlite',
		repoDB : 'repoRocks.sqlite',
		notaDB : 'notasRocks.sqlite',
		stmtDB : '',
	},
	cypher : {
		base   : '/shell/cypher',
		pathDB : 'apps/Rocks/sqlite',
	},
	encript : {
		base   : '/shell/encript',
	},
	clima : {
		base : '/shell/clima'
	}
}

export function goPag(pag,_id){
	if (vgk.params) var idSess = vgk.params.idSess;
	switch (pag){

		case 'INFO':
			window.open('rocksInfo.html','_blank');
			break;

	}
}

