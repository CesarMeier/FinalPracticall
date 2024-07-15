


<footer>

<div class="formulario" id="contacto">      
      <h1>Formulario de contacto</h1>
        <h3>Escríbenos y en breve los pondremos en contacto contigo</h3>

          <form action="" method="post">       
                <p>
                  <label for="nombre" class="colocar_nombre">Nombre
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="introducir_nombre" id="nombre" required="obligatorio" placeholder="Escribe tu nombre">
                </p>
              
                <p>
                  <label for="email" class="colocar_email">Email
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="email" name="introducir_email" id="email" required="obligatorio" placeholder="Escribe tu Email">
                </p>
            
                <p>
                  <label for="telefone" class="colocar_telefono">Teléfono
                  </label>
                    <input type="tel" name="introducir_telefono" id="telefono" placeholder="Escribe tu teléfono">
                </p>     
              
                <p>
                  <label for="mensaje" class="colocar_mensaje">Mensaje
                    <span class="obligatorio">*</span>
                  </label>                     
                                    <textarea name="introducir_mensaje" class="texto_mensaje" id="mensaje" required="obligatorio" placeholder="Deja aquí tu comentario..."></textarea> 
                </p>                    
              
                <button type="submit" name="enviar_formulario" id="enviar"><p>Enviar</p></button>

             
          </form>
    </div>  

<section id="info" >


<section class="page-section" id="contacto">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactanos</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>

                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <input class="form-control" id="name" type="text" placeholder="Tu Nombre *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Tu Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required" rows="5"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>

</section>


      <div class="pie"> 
      <p>Pie de Página: Sitio dedicado a ...........</p>
      </div>
</footer>

