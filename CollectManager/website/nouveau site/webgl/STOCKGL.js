var camera, scene,renderer;
init();
animate();
function init(){

	camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
	camera.position.y = 2;
	scene = new THREE.Scene();
	scene.background = new THREE.Color( 0x000 );

	var floor = new THREE.TextureLoader().load( 'webgl/textures/deathstar1.jpg' );
	floor.wrapS = THREE.RepeatWrapping;
	floor.wrapT = THREE.RepeatWrapping;
	floor.repeat.set(10,10);
	var matFloor = new THREE.MeshPhongMaterial( { map: floor} );
	var planeFloor = new THREE.Mesh(new THREE.PlaneGeometry(1000,1000), matFloor);
	planeFloor.rotation.x = -Math.PI/2;
	scene.add(planeFloor);

	var ambientLight = new THREE.AmbientLight(0xFFFFFF, 0.5);
    scene.add(ambientLight);

    var light = new THREE.SpotLight(0xFFFFFF, 1);
    light.position.set(0, 5, 0);
    light.angle = Math.PI / 2;
    light.penumbra = 1;
    light.decay = 2;
    light.distance = 100;
    light.castShadow = true;
    light.shadow.mapSize.width = 1024;
    light.shadow.mapSize.height = 1024;
    light.shadow.camera.near = 10;
    light.shadow.camera.far = 200;
    scene.add(light);

	block(-3,0,100,0,5);
	block(3,0,100,0,5);

	renderer = new THREE.WebGLRenderer( { antialias: true } );
	renderer.setPixelRatio( window.devicePixelRatio );
	renderer.setSize( window.innerWidth, window.innerHeight );
	var overlay = document.getElementById("overlayGL");
	overlay.appendChild( renderer.domElement );
	window.addEventListener( 'resize', onWindowResize, false );
}
function block(z,xMin,xMax, yMin,yMax){
	var i,j;
	var loadingManager = new THREE.LoadingManager( function () {
	   	for (i = xMin; i < xMax;i++){
	   		for(j = yMin; j < yMax;j++){
				var xPos = i + Math.random() * 0.1;
				var yPos = j+0.5;
				var ratioScale = 0.5//Math.random()*15 + 2;

				
				tree.position.z = -xPos;
				tree.position.y = yPos;
				tree.position.x = z;
				scene.add(tree.clone());
			}
		}

    } );
    var loader = new THREE.ColladaLoader( loadingManager );
	loader.load( 'webgl/objs/cube.dae', function ( collada ) {
    	tree = collada.scene;
    	tree.traverse(function(child){
			child.castShadow = true;
   			child.receiveShadow = true;
			child.scale.set(0.65,0.65,0.71);
   			//child = new THREE.MeshPhongMaterial( { specular:0x222222,map: new THREE.TextureLoader().load( 'webgl/objs/BoxNormal.png' )} );
		});	
    } );
}
function onWindowResize() {
	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();
	renderer.setSize( window.innerWidth, window.innerHeight );
}
function animate() {
	camera.position.z-=0.001;
	requestAnimationFrame( animate );
	
	renderer.render( scene, camera );
}