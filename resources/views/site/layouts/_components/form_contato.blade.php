<form action="{{ route('site.contato') }}" method="POST" class="p-4 border rounded">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" value="{{  old('nome')  }}" type="text" placeholder="Nome" class="form-control"{{ $classe }}>
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input name="telefone" value="{{  old('telefone')  }}" type="text" id="telefone" maxlength="13" placeholder="Telefone" class="form-control"{{ $classe }}>
        <script>
            function mascaraTelefone(telefone) {
              telefone = telefone.replace(/\D/g,"");
              telefone = telefone.replace(/^(\d{2})(\d)/g,"($1)$2");
              
              return telefone;
            }
          
            var inputTelefone = document.getElementById("telefone");
            inputTelefone.addEventListener("input", function(event) {
              event.target.value = mascaraTelefone(event.target.value);
            });
        </script>
        {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input name="email" value="{{  old('email')  }}" type="text" placeholder="E-mail" class="form-control"{{ $classe }}>
        {{ $errors->has('email') ? $errors->first('email') : '' }}
    </div>
    <div class="mb-3">
        <select name="motivo_contato" class="form-control"{{ $classe }}>
            <option value="">Motivo do contato</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option value="{{$key}}" {{ old('motivo_contato') == $key ? 'selected' : '' }}> {{ $motivo_contato }} </option>
            @endforeach
        </select>
            {{ $errors->has('motivo_contato') ? $errors->first('motivo_contato') : '' }}
    </div>
    <div class="mb-3">
        <label for="mensagem" class="form-label">Mensagem</label>
        @if (old('mensagem') !== '')
        @php $mensagem=old('mensagem'); @endphp
    @endif
    <textarea name="mensagem" class="form-control {{ $classe }}" placeholder="Preencha aqui sua mensagem">{{ $mensagem }}</textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success {{ $classe }}">ENVIAR</button>
    </div>
</form>
