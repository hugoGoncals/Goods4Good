app.controller('adminProductsController', function ($scope, $http, API_URL, $filter) {



	var vm = this;

	vm.listProdsCar = [];
	vm.listProdsCarAut = [];
	vm.listaProviders = [];
	vm.listaCategorias = [];
	var totalCabaz = 0;


	vm.car = {
		name: "",
		total: 0
	}

	function activate() {

		//retrieve employees listing from API
		$http.get(API_URL + "product")
			.success(function (response) {
				vm.listProduts = response;
			});

		$http.get(API_URL + "provider/listagem")
			.success(function (response) {
				vm.listProviders = response;
				//alert(vm.listProviders);
			});
		$http.get(API_URL + "categorie")
			.success(function (response) {
				vm.listaCategorias = response;
				//alert(vm.listProviders);
			});

	}


	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value; // Display the default slider value

	// Update the current slider value (each time you drag the slider handle)
	slider.oninput = function () {
		output.innerHTML = this.value;
	}

	vm.disableInput = function () {
		var myElement = angular.element(document.querySelector('#opcoes'));
		myElement.attr('disabled', 'disabled');
	}

	vm.showManualBasket = function () {

		vm.listProdsCar.length = 0;
		var myElement = angular.element(document.querySelector('#cabazAutomatico'));
		//myElement.css('display', 'none');
		myElement.hide();
		var myElement = angular.element(document.querySelector('#cabazManual'));
		//myElement.css('display', 'none');
		myElement.show();
	}

	vm.showRandomBasket = function () {

		vm.listProdsCar.length = 0;
		var myElement = angular.element(document.querySelector('#cabazManual'));
		//myElement.css('display', 'none');
		myElement.hide();
		var myElement = angular.element(document.querySelector('#cabazAutomatico'));
		//myElement.css('display', 'none');
		myElement.show();
	}

	vm.createRandomBasket = function () {

		//alert("ASD "+$scope.provid);
		$.ajaxSetup({
			headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
		});
		jQuery.ajax({
			url: API_URL + "product/prod/automatic",
			type: 'GET',
			data: { provider: $scope.provid, categorias: $scope.categorias },
			success: function (data) {

				var i = 0;
				var dadosBD = data; // dummy data
				var cabaz = []; 
				vm.listProdsCarAut = [];
				var range = $scope.rang;
				var threshold = 2;
				var contador = 0;
				totalCabaz = 0;
		  
				do{
					var i = 0;
		  
					var valido = true;
		  
					var existe = false;
		  
					//Math.floor(Math.random() * (max - min) ) + min; max excluded / Math.floor(Math.random() * (max - min + 1) ) + min; max included
		  
					var id = Math.floor(Math.random() * (dadosBD.length)); //excluded 
					var quant = Math.floor(Math.random() * (dadosBD[id].quantity - 1 + 1) ) + 1; //included 
					var totLinha = quant * dadosBD[id].price; // preco total da linha 
				if(totLinha + totalCabaz > range){
					do{ // Se ultrapassar o threshold
						if(quant > 1){
							quant--;  // Reduz a quantidade 1 por um até encontrar um valor que vá de encontro aos requisitos
							totLinha = quant * dadosBD[id].price;
						}
						else{
							valido = false; // Se não conseguir valido passa a falso, não vamos adicionar este item
						} 
					}while(totLinha + totalCabaz > range && valido); // threshold máximo, pode ser 0
				}
		  
					 if(valido){ // Se encontrarmos algo que sirva para os requisitos
						  if(cabaz.length > 0){ // Se o cabaz não estiver vazio
							do{ // Percorremos o cabaz pelo índice
								if(dadosBD[id].id == cabaz[i].tipo){ // Se o que estivermos a tentar inserir já existe no cabaz 
									cabaz[i].quantidade += quant; // Adicionamos a quantidade do item
									existe = true; // Variável existe passa a true
									contador = 0;
									totalCabaz += totLinha;
									dadosBD[id].quantity = dadosBD[id].quantity - quant; 
								}
								else{ 
									i++; // Caso não encontrarmos o novo item neste índice passamos ao próximo
								} 
							}while(i < cabaz.length && !existe);
						  }
		  
						if(!existe){   // Se não existe no cabaz
						  var temp = { // Criamos uma nova entrada no array do cabaz
							  nome: dadosBD[id].description,
							  quantidade: quant,
							  preco: dadosBD[id].price,
							  tipo: dadosBD[id].id
						  }
							  cabaz.push(temp); // Adicionamos a entrada ao cabaz
							  contador = 0; 
							  dadosBD[id].quantity = dadosBD[id].quantity - quant;
							  totalCabaz += totLinha; // O total aumenta 
						}
		  
					} 
					contador++;
					if(contador >= 50){
						break;
					} 
					var t = range - threshold; 
				}while(totalCabaz < range - threshold); //threshold mínimo
		   
				//alert("TOTAL "+totalCabaz);
				
				for(var i = 0; i< cabaz.length; i++){
				 // alert("PRODUTOS: "+ cabaz[i].nome+", Quantidade "+cabaz[i].quantidade);  // Imprimir o conteúdo do cabaz
				  vm.listProdsCarAut.push(angular.copy(cabaz[i]));
				} 
			},
			error: function (xhr, b, c) {
				console.log("xhr=" + xhr + " b=" + b + " c=" + c);
			}
		}); 
	}

	vm.removeFromAutomaticCar = function (index) {
		vm.listProdsCarAut.splice(index, 1);

		 
	};

	vm.saveAutomaticCar = function () {
		
		
				var url = API_URL + "productsbasket"; 

				vm.car.name = $scope.nomeCarro;
				vm.car.price = totalCabaz;
				vm.car.priority = 1; 

				$http({
					method: 'POST',
					url: url,
					data: $.param(vm.car),
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
				}).success(function (response) {
					
					vm.car.id = response;
					alert("sucess");
					 
					SaveProdsAutomaticCar()
		
				}).error(function (response) {
					console.log(response);
				//	alert('This shit is going down');
				});
		
			}

			function SaveProdsAutomaticCar() {
				
						var url = API_URL + "productsline";

						for(var i=0; i<vm.listProdsCarAut.length; i++){

							var obj = {
								idbasket: vm.car.id,
								idproduct: vm.listProdsCarAut[i].tipo,
								quantity: vm.listProdsCarAut[i].quantidade,
								totalline: vm.listProdsCarAut[i].preco * vm.listProdsCarAut[i].quantidade
							}
				
							$http({
								method: 'POST',
								url: url,
								data: $.param(obj),
								headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
							}).success(function (response) {
				 
								
									//alert("carrinho guardado com sucesso")
				
								
				
							}).error(function (response) {
								console.log(response);
								//alert('This is embarassing. An error has occured. Please check the log for details');
							});
						}
				
						angular.forEach(vm.listProdsCarAut, function (prod, c) {
				 
				
				
						});
				
					}


	vm.addCar = function (product) {
		var l = $filter('filter')(vm.listProdsCar, { id: product.id });
		if (!l.length) {
			vm.listProdsCar.push(angular.copy(product));
		} else {
			alert("O produto ja esta no carrinho");
		}
	}

	vm.removeFromCar = function (index) {
		vm.listProdsCar.splice(index, 1);

		if (vm.listProdsCar.length == 0) {
			var myElement = angular.element(document.querySelector('#opcoes'));
			myElement.removeAttr('disabled');
		}
	};


	vm.getTotalCar = function () {
		var total = 0;

		if (vm.listProdsCar.length) {

			angular.forEach(vm.listProdsCar, function (prod, c) {
				total += prod.quantity * prod.price;
			});

		}

		vm.car.price = total;

		return total;

	}


	vm.saveCar = function () {

		console.log(vm.car);

		vm.car.priority = 1;//depois ve la o que é isto.

		if (!vm.car.name) {
			alert(" preenche o nome do carrinho faz favor!")
			return
		}

		var haveProdsWithoutQtd = false;
		angular.forEach(vm.listProdsCar, function (prod, c) {
			haveProdsWithoutQtd = haveProdsWithoutQtd ? true : (prod.quantity == null || prod.quantity == undefined);
		});

		if (haveProdsWithoutQtd) {
			alert(" oh boy existem prods sem quantiddes!");
			return
		}

		var url = API_URL + "productsbasket";

		$http({
			method: 'POST',
			url: url,
			data: $.param(vm.car),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function (response) {

			vm.car.id = response;

			SaveProdsCar();

		}).error(function (response) {
			console.log(response);
			alert('This shit is going down');
		});

	}


	function SaveProdsCar() {

		var url = API_URL + "productsline";

		angular.forEach(vm.listProdsCar, function (prod, c) {


			var obj = {
				idbasket: vm.car.id,
				idproduct: prod.id,
				quantity: prod.quantity,
				totalline: prod.price * prod.quantity
			}

			$http({
				method: 'POST',
				url: url,
				data: $.param(obj),
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function (response) {

				if ((c + 1) == vm.listProdsCar.length) {

					alert("carrinho guardado com sucesso")

				}

			}).error(function (response) {
				console.log(response);
				alert('This is embarassing. An error has occured. Please check the log for details');
			});

		});

	}


	activate();

});