<!-- ProINVENHCi -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - ProINVENHCi';
$this->breadcrumbs=array(
	'ProINVENHCi',
);
?>

<section class="informativa">

	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
	</section>


		<section class="column-center">

		<h3>PROGRAMA DE DETECCIÓN DE INVENCIONES CLÍNICAS Y TECNOLÓGICAS PARA EL REGISTRO DE PATENTES DEL HOSPITAL CIVIL DE GUADALAJARA: proINVENHCi</h3>
	     <hr>
	     
	      <div class="generalinformation">

	      <p>TODAS LAS PATENTES SON INVENCIONES,AUNQUE NO TODAS LAS INVENCIONES SON PATENTABLES </p> <!--centrado y letra cursiva--> 
		  <p>
			La comunidad científica de México produce anualment
			e alrededor de 10 mil artículos en revistas
			especializadas; el Organismo Público Descentralizad
			o Hospital Civil de Guadalajara (OPD HCG) se encuen
			tra
			entre las primeras 10 instituciones de salud por el
			número de publicaciones científicas (Foro Consulti
			vo
			Científico y Tecnológico AC, 2009); sin embargo, no
			existe ninguna patente registrada del OPD HCG y lo
			s
			resultados de las investigaciones locales no se apl
			ican para la innovación. El conocimiento en medicin
			a
			solamente tiene impacto social y económico cuando e
			s aplicado para el beneficio de los enfermos y las
			comunidades. 
		</p>

		<p>
			<h5>OBJETIVO DEL proINVENCHCi</h5>
			Identificar los resultados de investigación o inven
			ciones patentables del personal del OPD HCG, para la
			innovación en medicina. 
		</p>

		<p>
			<h5>DEFINICIONES</h5>
			<ul>
				<li>
					INVENTAR: la creación de algo nuevo o no conocido,
					que a través de la aplicación de tecnología, resuel
					veun problema específico.
				</li>

				<li>
					INNOVAR: la mejora de procesos, productos o servicios.
				</li>
				
				<li>
					INVENCIONES PROTEGIBLES: las distintas modalidades
					de protección de las invenciones son: Patente
					de Invención, Modelos de Utilidad y Diseños Industr
					iales; estas modalidades se enmarcan dentro de la
					propiedad industrial, que a su vez forma parte del
					campo de la propiedad intelectual. 
				</li>
				
				<li>
					PATENTE DE INVENCIÓN: derechos exclusivos, otorgado
					s por el IMPI, por un cierto periodo de tiempo,
					para la divulgación y explotación exclusivas de una
					invención que sea nueva a nivel mundial y que no
					sea obvia a la vista de la tecnología conocida. 

				</li>
				
				<li>
					MODELO DE UTILIDAD: derechos exclusivos, otorgados
					a mejoras tecnológicas de dispositivos ya
					conocidos, que sean aplicables en la actividad econ
					ómica, por ejemplo, herramientas quirúrgicas,
					dispositivos médicos y prótesis mecánicas. 

				</li>
				
				<li>
					DISEÑO INDUSTRIAL: derechos exclusivos, otorgados a
					mejoras únicamente estéticas, ya sea en la
					forma y/o apariencia de un objeto o de una imagen,
					que presenten novedad a nivel mundial y que sea
					aplicable en la actividad económica. 

				</li>
				
				<li>
					REQUISITOS DEL PATENTAMIENTO: son tres, la novedad,
					actividad inventiva y factibilidad de
					aplicación en el ámbito comercial/industrial. 

				</li>
				
				<li>
					PROTECCIÓN INTERNACIONAL: los derechos que se obtie
					nen son otorgados por el país donde se
					solicitan; la protección puede obtenerse en 148 paí
					ses a la vez, a través del trámite del Tratado de
					Cooperación en Materia de Patentes. 
				</li>
				
			</ul>
		</p>
		<p>
			NO SON PATENTABLES: el material biológico y genétic
			o tal como se encuentra en la naturaleza; los proce
			sos
			esencialmente biológicos para la producción, reprod
			ucción y propagación de plantas y animales; las raz
			as
			animales; el cuerpo humano y las variedades vegetal
			es. Una idea por sí sola no es suficiente para ser
			patentada,
			ya que no es representativa del producto final.
		</p>

</div>
	</section>


	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/desplegraProINVENHCi'); ?>
	</section>

</section>
