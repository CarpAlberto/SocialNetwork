$(function() {

	var database = 
     [
	      {
	      	 category:"Grupuri",
	      	 label:"E213-C",
	      	 value:"E213-C"
	       },
	      {
	      	 category:"Grupuri",
	      	 label:"E213",
	      	 value:"E213"
	      },
	      { 
	      	 category:"Persoane",
	      	 label:"Carp Alberto",
	      	 value:"Carp Alberto",
	      	 username:"Alberto234",
	      	 password:"1234QWERTY",
	      	 email:"alberto_carp@yahoo.com",
	      	 image:"Alberto_Carp",
	      	 description:"Traieste in:Iasi Romania"
	      },
	        { 
	      	 category:"Persoane",
	      	 label:"Mihai Alina",
	      	 value:"Mihai Alina",
	      	 username:"Alinao234",
	      	 password:"12ddWERTY",
	      	 image:"Alina_Mihai",
	      	 description:"Traieste cu Andrei",
	      },
	      {
	      	 category:"Persoane",
	      	 label:"Hiji Iulian",
	      	 value:"Hiji Iulian",
	      	 username:"hiji_ajja",
	      	 password:"blabla",
	      	 image:"Hiji_Iulian",
	      	 description:"Traieste in Volovat =D"
	      },
	      {
	      	category:"Persoane",
	      	label:"Ioana Matei",
	      	value:"Ioana Matei",
	      	username:"IoanaMat7",
	      	email:"Ioana_Matei@gmail.com",
	      	password:"1122219IO",
	      	image:"Ioana_Matei",
	      	description:"Traieste in:Suceava Romania"
	      },
    ];
    localStorage["database"] = JSON.stringify(database);
});