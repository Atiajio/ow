/**
 *  SYSTEM DE GESTION DES REQUETES VERS LE SERVEUR
 * @type {{get: OW.get}}
 */

var OW = {
    get : function(url, params, call_back_success, call_back_error , return_type ='json'){
        /**
         * Gestion des requestes de type get
         */
        let final_url = BASE_URL + url;
        $.ajax(
            {
                url : final_url,
                data : params,
                method : 'GET',
                dataType : return_type,
                success : function (result){

                    call_back_success(result);

                },
                error : function (result){

                    call_back_error(result);

                }
            }
        );
    },
    post : function(url, params, call_back_success, call_back_error , return_type ='json'){
        /**
         * Gestion des requestes de type post
         */
        let final_url = BASE_URL + url;
        $.ajax(
            {
                url : final_url,
                data : params,
                method : 'POST',
                dataType : return_type,
                success : function (result){

                    call_back_success(result);

                },
                error : function (result){

                    call_back_error(result);

                }
            }
        );
    }
};