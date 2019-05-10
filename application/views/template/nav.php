<div id="nav" class="col-md-2 no-gutters d-none d-md-block">
    <ul id="nav-list">
        <li><a href="<?= base_url('home'); ?>"><i class="fas fa-chart-pie"></i> Página Inicial</a></li>
        <li><a href="#"><i class="fas fa-calendar-alt"></i> Agenda</a></li>
        <li class="hasChild"><i class="fas fa-address-card"></i> Leads
            <ul class="navChild d-none">
                <li><a href="<?= base_url('leads'); ?>"><i class="fas fa-list"></i> Listar Leads</a></li>
                <li><a href="#"><i class="fas fa-plus-square"></i> Cadastrar Lead</a></li>
            </ul>
        </li>
        <li class="hasChild"><i class="fas fa-handshake"></i> Clientes
            <ul class="navChild d-none">
                <li><a href="#"><i class="fas fa-list"></i> Listar Clientes</a></li>
                <li><a href="#"><i class="fas fa-plus-square"></i> Cadastrar Cliente</a></li>
            </ul>
        </li>
        <li class="hasChild"><i class="fas fa-dolly"></i> Produtos
            <ul class="navChild d-none">
                <li><a href="#"><i class="fas fa-list"></i> Listar Produtos</a></li>
                <li><a href="#"><i class="fas fa-plus-square"></i> Cadastrar Produto</a></li>
            </ul>
        </li>
        <li class="logout"><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
    </ul>
</div>
<div class="col-md-2"><!-- let content to the right --></div>
<div class="col-md-10" style="padding-top: 15px; padding-bottom: 25px; margin-top: 64px">
