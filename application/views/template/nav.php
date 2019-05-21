<div id="nav" class="col-md-2 no-gutters d-none d-md-block">
    <ul id="nav-list">
        <li><a href="<?= base_url('home'); ?>"><i class="fas fa-chart-pie fa-fw"></i> Página Inicial</a></li>
        <li><a href="#"><i class="fas fa-calendar-alt fa-fw"></i> Agenda</a></li>
        <li class="hasChild"><i class="fas fa-address-card fa-fw"></i> Leads
            <ul class="navChild d-none">
                <li><a href="<?= base_url('leads'); ?>"><i class="fas fa-list fa-fw"></i> Listar Leads</a></li>
                <li><a href="<?= base_url('leads/newLead'); ?>"><i class="fas fa-plus-square fa-fw"></i> Cadastrar Lead</a></li>
            </ul>
        </li>
        <li class="hasChild"><i class="fas fa-handshake fa-fw"></i> Clientes
            <ul class="navChild d-none">
                <li><a href="#"><i class="fas fa-list fa-fw"></i> Listar Clientes</a></li>
                <li><a href="#"><i class="fas fa-plus-square fa-fw"></i> Cadastrar Cliente</a></li>
            </ul>
        </li>
        <li class="hasChild"><i class="fas fa-dolly fa-fw"></i> Produtos
            <ul class="navChild d-none">
                <li><a href="<?= base_url('products'); ?>"><i class="fas fa-list fa-fw"></i> Listar Produtos</a></li>
                <li><a href="#"><i class="fas fa-plus-square fa-fw"></i> Cadastrar Produto</a></li>
            </ul>
        </li>
        <li class="logout"><a href="#"><i class="fas fa-sign-out-alt fa-fw"></i> Sair</a></li>
    </ul>
</div>
<div class="col-md-2"><!-- let content to the right --></div>
<div class="col-md-10" style="padding-top: 15px; padding-bottom: 25px; margin-top: 64px">
